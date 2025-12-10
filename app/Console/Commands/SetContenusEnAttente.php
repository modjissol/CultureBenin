<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contenu;

class SetContenusEnAttente extends Command
{
    protected $signature = 'contenus:en-attente';
    protected $description = 'Met tous les contenus au statut en attente';

    public function handle()
    {
        $updated = \App\Models\Contenu::query()->update(['statut' => 'en_attente']);
        $this->info("$updated contenus mis au statut 'en attente'.");
    }
}
