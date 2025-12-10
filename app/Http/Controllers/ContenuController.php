<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use App\Models\Traduction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContenuController extends Controller
{
    /**
     * Refuse un contenu (change le statut à 'refusé')
     */
    public function refuser($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->statut = 'refusé';
        $contenu->save();
        return redirect()->back()->with('success', 'Contenu refusé !');
    }

    /**
     * Supprime un contenu définitivement
     */
    public function supprimer($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->delete();
        return redirect()->back()->with('success', 'Contenu supprimé !');
    }
    /**
     * Affiche les contenus en attente de validation
     */
    public function enAttente()
    {
        $contenus = Contenu::with(['auteur'])
            ->where('statut', 'en attente')
            ->get();
        return view('contenus.en_attente', compact('contenus'));
    }

    /**
     * Valide un contenu (change le statut à 'valide')
     */
    public function valider($id)
    {
        $contenu = Contenu::findOrFail($id);
        $contenu->statut = 'valide';
        $contenu->date_validation = now();
        $contenu->save();
        return redirect()->back()->with('success', 'Contenu validé et publié !');
    }
    /**
     * Noter un contenu (AJAX) via la table commentaires
     */
    public function rate(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);
        $note = (int) $request->input('note');
        $user = auth()->user();
        if ($user) {
            // Un utilisateur ne peut noter qu'une fois un contenu
            $commentaire = $contenu->commentaires()->where('id_utilisateur', $user->id_utilisateur)->first();
            if ($commentaire) {
                $commentaire->note = $note;
                $commentaire->save();
            } else {
                $contenu->commentaires()->create([
                    'note' => $note,
                    'id_utilisateur' => $user->id_utilisateur
                ]);
            }
        }
        // Calculer la note moyenne
        $note_moyenne = $contenu->commentaires()->whereNotNull('note')->avg('note');
        return response()->json(['note_moyenne' => round($note_moyenne, 2)]);
    }

    /**
     * Commenter un contenu (AJAX) via la table commentaires
     */
    public function comment(Request $request, $id)
    {
        $contenu = Contenu::findOrFail($id);
        $comment = $request->input('comment');
        $user = auth()->user();
        $contenu->commentaires()->create([
            'texte' => $comment,
            'id_utilisateur' => $user ? $user->id_utilisateur : null
        ]);
        return response()->json([
            'user' => $user ? $user->name : 'Utilisateur',
            'comment' => $comment
        ]);
    }
    /**
     * Affiche la liste des contenus
     */
    public function index()
    {
        $contenus = Contenu::with(['region', 'langue', 'typeContenu', 'auteur', 'moderateur', 'parent'])
                          ->get();
        return view('contenus.index', compact('contenus'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        $regions = Region::all();
        $langues = Langue::all();
        $typeContenus = TypeContenu::all();
        $utilisateurs = Utilisateur::all();
        $contenusParents = Contenu::all(); // Pour le parent_id
        
        return view('contenus.create', compact(
            'regions', 
            'langues', 
            'typeContenus', 
            'utilisateurs',
            'contenusParents'
        ));
    }

    /**
     * Enregistre un nouveau contenu
     */
    public function store(Request $request)
    {
        // For user-submitted contents we accept ONLY these fields:
        // - titre, texte, region (or id_region), langue (or id_langue), type_contenu (or id_type_contenu), media
        // Other fields (parent_id, statut, id_moderateur, date_validation...) are reserved to admin and ignored here.
        $rules = [
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'region' => 'nullable|string|max:255',
            'langue' => 'nullable|string|max:255',
            'type_contenu' => 'nullable|string|max:255',
            'id_region' => 'nullable|exists:regions,id_region',
            'id_langue' => 'nullable|exists:langues,id_langue',
            'id_type_contenu' => 'nullable|exists:type_contenus,id_type_contenu',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,mp3,wav|max:10240'
        ];
        $request->validate($rules);

        $auteur = auth()->user();
        if (!$auteur) {
            return redirect()->back()->withInput()->with('error', "Vous devez être connecté pour proposer un contenu.");
        }

        // Ensure we have an utilisateurs.id to satisfy the foreign key constraint.
        // If the authenticated user is already a Utilisateur (has id_utilisateur), use it.
        // Otherwise, try to find a matching Utilisateur by email or create one with sensible defaults.
        if (isset($auteur->id_utilisateur)) {
            $id_auteur = $auteur->id_utilisateur;
        } else {
            $util = Utilisateur::where('email', $auteur->email)->first();
            if (! $util) {
                // Ensure there is a default role
                $role = \App\Models\Role::firstOrCreate(['nom_role' => 'user']);
                // Ensure there is at least one langue
                $langDefault = Langue::first();
                if (! $langDefault) {
                    $langDefault = Langue::firstOrCreate(['nom_langue' => 'Français'], ['code_langue' => 'fr', 'description' => 'Français par défaut']);
                }

                $name = $auteur->name ?? null;
                $prenom = '';
                $nom = $name;
                if ($name && strpos($name, ' ') !== false) {
                    $parts = explode(' ', $name);
                    $prenom = array_shift($parts);
                    $nom = implode(' ', $parts) ?: $prenom;
                }

                $util = Utilisateur::create([
                    'nom' => $nom ?? 'Utilisateur',
                    'prenom' => $prenom ?? '',
                    'email' => $auteur->email,
                    'mot_de_passe' => bcrypt(\Illuminate\Support\Str::random(16)),
                    // 'sexe' column length is 10 in the migration; use a short default value
                    'sexe' => 'inconnu',
                    // date_inscription is a DATE column, store as Y-m-d
                    'date_inscription' => now()->toDateString(),
                    'date_naissance' => null,
                    'statut' => 'actif',
                    'photo' => null,
                    'id_role' => $role->id_role,
                    'id_langue' => $langDefault->id_langue,
                ]);
            }
            $id_auteur = $util->id_utilisateur;
        }

        // Resolve region: prefer provided id, otherwise use/create by name
        if ($request->filled('id_region')) {
            $id_region = $request->input('id_region');
        } else {
            $regionName = trim($request->input('region'));
            if (! $regionName) {
                return redirect()->back()->withInput()->withErrors(['region' => 'La région est requise.']);
            }
            $region = Region::firstOrCreate(['nom_region' => $regionName]);
            $id_region = $region->id_region;
        }

        // Resolve langue
        if ($request->filled('id_langue')) {
            $id_langue = $request->input('id_langue');
        } else {
            $langueName = trim($request->input('langue'));
            if (! $langueName) {
                return redirect()->back()->withInput()->withErrors(['langue' => 'La langue est requise.']);
            }
            // Generate a code_langue (max 10 chars) and ensure uniqueness
            $base = preg_replace('/[^A-Za-z0-9]/', '', Str::slug($langueName, ''));
            $base = strtoupper(substr($base, 0, 10));
            $code = $base ?: strtoupper(substr(md5($langueName), 0, 8));
            $i = 1;
            while (Langue::where('code_langue', $code)->exists()) {
                $suffix = (string) $i;
                $code = strtoupper(substr($base, 0, max(0, 10 - strlen($suffix)))) . $suffix;
                $i++;
            }

            $langue = Langue::firstOrCreate(
                ['nom_langue' => $langueName],
                ['code_langue' => $code, 'description' => null]
            );
            $id_langue = $langue->id_langue;
        }

        // Resolve type de contenu
        if ($request->filled('id_type_contenu')) {
            $id_type_contenu = $request->input('id_type_contenu');
        } else {
            $typeName = trim($request->input('type_contenu'));
            if (! $typeName) {
                return redirect()->back()->withInput()->withErrors(['type_contenu' => 'Le type de contenu est requis.']);
            }
            $type = TypeContenu::firstOrCreate(['nom_contenu' => $typeName]);
            $id_type_contenu = $type->id_type_contenu;
        }

        // Create contenu with only the allowed fields for normal users. Admin will set other fields later.
        $contenu = Contenu::create([
            'titre' => $request->titre,
            'texte' => $request->texte,
            'date_creation' => now(),
            'statut' => 'en attente',
            'parent_id' => null,
            'date_validation' => null,
            'id_region' => $id_region,
            'id_langue' => $id_langue,
            'id_moderateur' => null,
            'id_type_contenu' => $id_type_contenu,
            'id_auteur' => $id_auteur
        ]);

        // Gestion du média
        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $filename = uniqid('media_').'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/medias', $filename, 'public');

            // Déduire le type de média (image, audio, vidéo)
            $mime = $file->getMimeType();
            $type = 'autre';
            if (str_starts_with($mime, 'image/')) $type = 'image';
            elseif (str_starts_with($mime, 'audio/')) $type = 'audio';
            elseif (str_starts_with($mime, 'video/')) $type = 'video';

            // Créer ou récupérer le type de média
            $typeMedia = \App\Models\TypeMedia::firstOrCreate([
                'nom_media' => $type
            ]);

            \App\Models\Media::create([
                'chemin' => $path,
                'description' => null,
                'id_contenu' => $contenu->id_contenu,
                'id_type_media' => $typeMedia->id_type_media
            ]);
        }

        return redirect()->route('home')
            ->with('success', 'Contenu créé avec succès!');
    }

    /**
     * Affiche les détails d'un contenu
     */
    public function show(Contenu $contenu)
    {
        $contenu->load(['region', 'langue', 'typeContenu', 'auteur', 'moderateur', 'parent', 'enfants', 'medias', 'commentaires']);
        return view('contenus.show', compact('contenu'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Contenu $contenu)
    {
        $user = auth()->user();
        $isAdmin = $user && (isset($user->role) ? $user->role === 'admin' : false);
        $isAuthor = $user && ($user->id_utilisateur ?? $user->id) === $contenu->id_auteur;
        if ($isAdmin) {
            $regions = Region::all();
            $langues = Langue::all();
            $typeContenus = TypeContenu::all();
            $utilisateurs = Utilisateur::all();
            $contenusParents = Contenu::where('id_contenu', '!=', $contenu->id_contenu)->get();
            return view('contenus.edit', compact(
                'contenu',
                'regions', 
                'langues', 
                'typeContenus', 
                'utilisateurs',
                'contenusParents'
            ));
        } elseif ($isAuthor) {
            return view('contenus.edit_auteur', compact('contenu'));
        } else {
            return redirect()->route('contenus.show', $contenu->id_contenu);
        }
    }

    /**
     * Met à jour un contenu
     */
    public function update(Request $request, Contenu $contenu)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'required|string',
            'date_creation' => 'required|date',
            'statut' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:contenus,id_contenu',
            'date_validation' => 'nullable|date',
            'id_region' => 'required|exists:regions,id_region',
            'id_langue' => 'required|exists:langues,id_langue',
            'id_moderateur' => 'nullable|exists:utilisateurs,id_utilisateur',
            'id_type_contenu' => 'required|exists:type_contenus,id_type_contenu',
            'id_auteur' => 'required|exists:utilisateurs,id_utilisateur'
        ]);

        $contenu->update($request->all());

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu modifié avec succès!');
    }

    /**
     * Supprime un contenu
     */
    public function destroy(Contenu $contenu)
    {
        $contenu->delete();

        return redirect()->route('contenus.index')
            ->with('success', 'Contenu supprimé avec succès!');
    }

    /**
     * Show traduction form for a contenu.
     */
    public function traductionForm(Contenu $contenu)
    {
        $langues = \App\Models\Langue::all();
        return view('contenus.traduction', compact('contenu', 'langues'));
    }

    /**
     * Store a traduction submitted by a user.
     */
    public function storeTraduction(Request $request, Contenu $contenu)
    {
        $request->validate([
            'langue_cible' => 'nullable|string|max:10',
            'texte_traduit' => 'required|string'
        ]);

        $user = auth()->user();
        $id_utilisateur = $user ? ($user->id_utilisateur ?? null) : null;

        Traduction::create([
            'id_contenu' => $contenu->id_contenu,
            'langue_cible' => $request->input('langue_cible'),
            'texte_traduit' => $request->input('texte_traduit'),
            'id_utilisateur' => $id_utilisateur
        ]);

        return redirect()->route('home')->with('success', 'Traduction soumise. Merci !');
    }
}