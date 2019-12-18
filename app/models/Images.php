<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

use DB;

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'ID_IMG',
        'TITRE_IMG'
    ];

        // On peut ajouter ou modifier des données
        public $timetamps = true;  
}

?>