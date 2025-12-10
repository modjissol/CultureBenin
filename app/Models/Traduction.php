<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traduction extends Model
{
    protected $table = 'traductions';
    protected $primaryKey = 'id_traduction';
    protected $fillable = [
        'id_contenu',
        'langue_cible',
        'texte_traduit',
        'id_utilisateur'
    ];

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu', 'id_contenu');
    }
}
