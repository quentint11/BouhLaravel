<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

use DB;

class Utilisateur extends Model
{
    protected $table = 'utilisateur';

    protected $fillable = [
        'ID_UTILISATEUR',
        'ID_TYPEUTILISATEUR',
        'MAIL_UTILISATEUR',
        'NOM_UTILISATEUR',
        'PRENOM_UTILISATEUR',
        'TEL_UTILISATEUR',
        'PSEUDO_UTILISATEUR',
        'MOTDEPASSE_UTILISATEUR',
        'NIVEAU_UTILISATEUR',
        'EXPERIENCE_UTILISATEUR',
        'IMAGE_UTILISATEUR'

    ];

        // On peut ajouter ou modifier des données
        public $timetamps = true;  
}

?>