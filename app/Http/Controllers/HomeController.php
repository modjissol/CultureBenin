<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contenu;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil du site
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Articles à la une sur la culture africaine
        $featuredArticles = [
            [
                'title' => "Festival Gèlèdé à Covè",
                'image' => asset('images/gelede.jpg'),
                'categories' => ['Fête traditionnelle', 'Covè'],
                'date' => '6 décembre 2025',
                'excerpt' => "Le Gèlèdé est une cérémonie masquée célébrant les femmes et les ancêtres, avec danses, chants et masques colorés typiques du Bénin."
            ],
            [
                'title' => "Recette du Akassa et sauce tomate",
                'image' => asset('images/akassa.jpg'),
                'categories' => ['Cuisine béninoise', 'Bénin'],
                'date' => '5 décembre 2025',
                'excerpt' => "Découvrez comment préparer l'Akassa, plat à base de pâte de maïs fermentée, accompagné de la fameuse sauce tomate béninoise."
            ],
            [
                'title' => "Le marché des tissus à Dantokpa",
                'image' => asset('images/dantokpa.jpg'),
                'categories' => ['Artisanat', 'Cotonou'],
                'date' => '4 décembre 2025',
                'excerpt' => "Le marché Dantokpa est le plus grand d'Afrique de l'Ouest, réputé pour ses tissus wax, pagnes et objets artisanaux béninois."
            ]
        ];

        // Contenus validés à afficher sur l'accueil
        $contenusValidés = Contenu::where('statut', 'validé')->get();

        // Brèves sur la culture africaine
        $breves = [
            [
                'date' => '6 déc. 2025 - 10:00',
                'title' => "Cérémonie Vaudou à Ouidah",
                'excerpt' => "Chaque année, Ouidah accueille la fête du Vaudou, rassemblant prêtres, adeptes et curieux autour de rituels ancestraux béninois."
            ],
            [
                'date' => '5 déc. 2025 - 15:30',
                'title' => "Exposition sur les objets royaux d'Abomey",
                'excerpt' => "Le musée d'Abomey présente les trônes, sceptres et objets sacrés des rois du Dahomey, témoins de l'histoire du Bénin."
            ],
            [
                'date' => '4 déc. 2025 - 18:00',
                'title' => "Rencontre autour des langues nationales béninoises",
                'excerpt' => "Des linguistes et passionnés échangent sur la préservation et la valorisation des langues telles que le Fon, le Yoruba et le Bariba."
            ]
        ];

        return view('home', compact('featuredArticles', 'breves', 'contenusValidés'));
    }

    /**
     * Affiche un article individuel
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Logique pour afficher un article individuel
        $article = []; // Remplacer par la récupération de l'article depuis la base de données
        return view('articles.show', compact('article'));
    }
}
