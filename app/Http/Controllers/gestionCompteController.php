<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ServiceGestionCompte;

use App\models\Utilisateur;
use App\models\UtilisateurT;

class GestionCompteController extends Controller
{

    public function ModifierInfos()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON

            $visiteurJson = json_decode($json);

            if ($visiteurJson != null) 
            {

                // recuperation des informations du JSON
                $id = $visiteurJson->ID_UTILISATEUR;
                $nom = $visiteurJson->NOM_UTILISATEUR;
                $prenom = $visiteurJson->PRENOM_UTILISATEUR;
                $telephone = $visiteurJson->TEL_UTILISATEUR;

                $unUtilisateur = new ServiceGestionCompte();

                $reponseId = $unUtilisateur->VerifierIdUtilisateur($id);

                if($reponseId)
                {
                    $unUtilisateur->ModifierInfos($id, $nom, $prenom, $telephone);

                    return json_encode(true);
                }
                else
                {
                    return null;
                }               
            }
            else
            {
                return null;
            }
        }
        catch(Exception $e)
        {
            $erreur = $e->getMessage();
            return $erreur;
        }
    }

    public function SupprimerCompte($id)
    {
        try {
            if($id != null)
            {
                $unUtilisateur = new ServiceGestionCompte();
                $unUtilisateur->SuppCompte($id);               
            }
            else
            {
                return null;
            }
        }
        catch(Exception $e)
        {
            $erreur = $e->getMessage();
            return $erreur;
        }
    }
}