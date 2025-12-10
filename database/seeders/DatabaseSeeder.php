<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ajouter l'admin dans la table users pour l'auth Laravel
        \App\Models\User::updateOrCreate([
            'email' => 'maurice.comlan@uac.bj',
        ], [
            'name' => 'Comlan Maurice',
            'password' => bcrypt('Eneam123'),
        ]);

        // User::factory(10)->create();

        // Créer le rôle admin s'il n'existe pas
        $adminRole = \App\Models\Role::firstOrCreate(['nom_role' => 'admin']);

        // Créer une langue par défaut si besoin
        $langue = \App\Models\Langue::firstOrCreate([
            'nom_langue' => 'Français',
            'code_langue' => 'fr',
        ], [
            'description' => 'Français par défaut'
        ]);

        // Créer un utilisateur administrateur
        \App\Models\Utilisateur::updateOrCreate([
            'email' => 'maurice.comlan@uac.bj',
        ], [
            'nom' => 'Comlan',
            'prenom' => 'Maurice',
            'mot_de_passe' => bcrypt('Eneam123'),
            'sexe' => 'Homme',
            'date_inscription' => now(),
            'date_naissance' => '1990-01-01',
            'statut' => 'actif',
            'photo' => null,
            'id_role' => $adminRole->id_role,
            'id_langue' => $langue->id_langue,
        ]);
    }
}
