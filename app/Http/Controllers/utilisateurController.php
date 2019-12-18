<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ServiceUtilisateur;

use App\models\Utilisateur;
use App\models\UtilisateurT;

class UtilisateurController extends Controller
{
    public function listeUtilisateur()
    {
        try 
        {
            $unUtilisateur = new ServiceUtilisateur();
            $listeUtilisateur =  $unUtilisateur->listeUtilisateur();

            return json_encode($listeUtilisateur);
        }
        catch(Exception $e)
        {
            $erreur = $e->getMessage();
            return $erreur;
        }
    }

    public function listeImages()
    {
        try 
        {
            $unUtilisateur = new ServiceUtilisateur();
            $listeImages =  $unUtilisateur->listeImages();

            return json_encode($listeImages);
        }
        catch(Exception $e)
        {
            $erreur = $e->getMessage();
            return $erreur;
        }
    }

    public function ModifierImage($img, $idU)
    {
        try {
            if ($img != null && $idU != null) 
            {
                $uneImg = new ServiceUtilisateur();

                $uneImg->ModifierImg($img, $idU);

                return json_encode(true);
            }
            else
            {
                return null;
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}