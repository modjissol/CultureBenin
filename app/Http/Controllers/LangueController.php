<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    /**
     * Affiche la liste des langues
     */
    public function index()
    {
        // Récupère toutes les langues de la base
        $langues = Langue::all();
        
        // Retourne la vue avec les données
        return view('langues.index', compact('langues'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Enregistre une nouvelle langue
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues',
            'description' => 'nullable|string'
        ]);

        // Création de la langue
        Langue::create($request->all());

        // Redirection avec message de succès
        return redirect()->route('langues.index')
            ->with('success', 'Langue créée avec succès!');
    }

    /**
     * Affiche les détails d'une langue
     */
    public function show(Langue $langue)
    {
        return view('langues.show', compact('langue'));
    }

    /**
     * Affiche le formulaire d'édition
     */
    public function edit(Langue $langue)
    {
        return view('langues.edit', compact('langue'));
    }

    /**
     * Met à jour une langue
     */
    public function update(Request $request, Langue $langue)
    {
        $request->validate([
            'nom_langue' => 'required|string|max:255',
            'code_langue' => 'required|string|max:10|unique:langues,code_langue,' . $langue->id_langue . ',id_langue',
            'description' => 'nullable|string'
        ]);

        $langue->update($request->all());

        return redirect()->route('langues.index')
            ->with('success', 'Langue modifiée avec succès!');
    }

    /**
     * Supprime une langue
     */
    public function destroy(Langue $langue)
    {
        $langue->delete();

        return redirect()->route('langues.index')
            ->with('success', 'Langue supprimée avec succès!');
    }
}