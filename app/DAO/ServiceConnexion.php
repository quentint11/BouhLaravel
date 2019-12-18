<?php

    namespace App\DAO;

    use Illuminate\Support\Facades\Session;
    use Illuminate\DataBase\Eloquent\Model;
    use Illuminate\Support\Facades\Hash;
    use DB;
    use App\models\Utilisateur;

    class ServiceConnexion
    {
        public function connexion($login_visiteur, $pwd_visiteur)
        {

            if ($login_visiteur != null && $pwd_visiteur != null) 
            {
                try 
                {
                    $visiteur = DB::table('utilisateur')
                        ->where('MAIL_UTILISATEUR', '=', $login_visiteur)
                        ->first();

                    //verifie que les variables correspondent 
                    if($visiteur->MAIL_UTILISATEUR == $login_visiteur && Hash::check($pwd_visiteur, $visiteur->MOTDEPASSE_UTILISATEUR) == true)
                    {
                        return $visiteur;
                    }
                    else
                    {
                        return null;
                    }   
                } 
                catch (Exception $e) 
                {
                    $erreur = $e->getMessage();
                }
            }
        }

        //verifie que le mail existe pas
        public function verifieMail($log)
        {
            try
            {
                //$rep = true si le mail existe
                $rep = DB::table('utilisateur')                
                ->where('MAIL_UTILISATEUR', '=', $log)
                ->exists();

                $rep ? $rep = true : $rep = false;

                return $rep; 
            }
            catch(Exception $e)
            {
               $erreur = $e->getMessage();
               return $erreur;
            }
        }

        //verifie que le pseudo existe pas
        public function verifiePseudo($pseudo)
        {
            try
            {
                //$rep = true si le pseudo existe
                $rep = DB::table('utilisateur')                
                ->where('PSEUDO_UTILISATEUR', '=', $pseudo)
                ->exists();

                $rep ? $rep = true : $rep = false;

                return $rep;
            }
            catch(Exception $e)
            {
               $erreur = $e->getMessage();
               return $erreur;
            }
        }

        public function creationCompte($login_visiteur, $pwd_visiteur, $nom_visiteur, $prenom_visiteur, $tel_visiteur , 
                                       $pseudo_visiteur)
        {
            if ($login_visiteur != null && $pwd_visiteur != null) 
            {
                try 
                {
                    //protection mdp
                    $pwdHash = Hash::make($pwd_visiteur);

                      $visiteur = DB::table('utilisateur')
                        ->insert([ 'ID_TYPEUTILISATEUR' => 2,
                                   'MAIL_UTILISATEUR' => $login_visiteur, 
                                   'NOM_UTILISATEUR' => $nom_visiteur, 
                                   'PRENOM_UTILISATEUR' => $prenom_visiteur,                                   
                                   'TEL_UTILISATEUR' => $tel_visiteur, 
                                   'PSEUDO_UTILISATEUR' => $pseudo_visiteur,
                                   'MOTDEPASSE_UTILISATEUR' => $pwdHash,                                    
                                   'NIVEAU_UTILISATEUR' => 1,
                                   'EXPERIENCE_UTILISATEUR' => 1,
                                   'IMAGE_UTILISATEUR' => 'logo2.jpg']);
                      
                } 
                catch (Exception $e) 
                {
                    $erreur = $e->getMessage();
                }
            }
        }
    }
?>