<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAO\ServiceConnexion;

use App\models\Utilisateur;
use App\models\UtilisateurT;

class connexionController extends Controller
{
    public function verifierLog()
    {
        try {
            $json = file_get_contents('php://input'); // Récupération du flux JSON

            $visiteurJson = json_decode($json);

            if ($visiteurJson != null) 
            {
                //recuperation des variable dans le JSON
                $login_visiteur = $visiteurJson->MAIL_UTILISATEUR;
                $pwd_visiteur = $visiteurJson->MOTDEPASSE_UTILISATEUR;

                $unService = new ServiceConnexion();

                // Verifie que les logs existes et/ou correspondent
                $uneReponse = $unService->connexion($login_visiteur, $pwd_visiteur);

                //controle le retour
                if($uneReponse != null)
                {
                    //construction du JSON
                    $visiteur = new UtilisateurT();

                    $visiteur->setId_utilisateur($uneReponse->ID_UTILISATEUR);
                    $visiteur->setId_typeUtilisateur($uneReponse->ID_TYPEUTILISATEUR);
                    $visiteur->setMail_utilisateur($uneReponse->MAIL_UTILISATEUR);
                    $visiteur->setNom_utilisateur($uneReponse->NOM_UTILISATEUR);
                    $visiteur->setPrenom_utilisateur($uneReponse->PRENOM_UTILISATEUR);
                    $visiteur->setTel_utilisateur($uneReponse->TEL_UTILISATEUR);
                    $visiteur->setPseudo_utilisateur($uneReponse->PSEUDO_UTILISATEUR);
                    $visiteur->setLvl_utilisateur($uneReponse->NIVEAU_UTILISATEUR);
                    $visiteur->setExp_utilisateur($uneReponse->EXPERIENCE_UTILISATEUR);
                    $visiteur->setImg_utilisateur($uneReponse->IMAGE_UTILISATEUR);

                    return json_encode($visiteur);
                }
                else
                {
                    return null;
                }
            }
        }
        catch (Exception $e) 
        {
            $erreur = $e->getMessage();
            return response()->json($erreur);
        }
    }

    public function creationCompte()
    {
        try
        {
            $json = file_get_contents('php://input'); // Récupération du flux JSON

            $visiteurJson = json_decode($json);

            if($visiteurJson != null)
            {
                //recuperation des variable dans le JSON
                $login_visiteur = $visiteurJson->MAIL_UTILISATEUR;
                $pwd_visiteur = $visiteurJson->MOTDEPASSE_UTILISATEUR;
                $nom_visiteur = $visiteurJson->NOM_UTILISATEUR;
                $prenom_visiteur = $visiteurJson->PRENOM_UTILISATEUR;
                $tel_visiteur = $visiteurJson->TEL_UTILISATEUR;
                $pseudo_visiteur = $visiteurJson->PSEUDO_UTILISATEUR;
                

                $unService = new ServiceConnexion();

                //verifie que le mail existe pas
                $reponseMail = $unService->verifieMail($login_visiteur);

                if(!$reponseMail)
                {
                    $reponsePseudo = $unService->verifiePseudo($pseudo_visiteur);

                    // verifie que le pseudo existe pas
                    if(!$reponsePseudo)
                    {
                        // creer le compte
                        $unService->creationCompte($login_visiteur, $pwd_visiteur, $nom_visiteur, $prenom_visiteur, $tel_visiteur, 
                                                $pseudo_visiteur);

                        //envoie une confirmation
                        return json_encode(true);
                    }
                    else 
                    {
                        return null;
                    }
                }                   
                else
                {
                    return json_encode(false);
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
            return response()->json($erreur);
        }
    }
}
