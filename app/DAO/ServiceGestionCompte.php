<?php

    namespace App\DAO;

    use Illuminate\Support\Facades\Session;
    use Illuminate\DataBase\Eloquent\Model;
    use DB;
    use App\models\Utilisateur;

    class ServiceGestionCompte
    {

        public function VerifierIdUtilisateur($id)
        {
            $reponse = DB::table('utilisateur')
                            ->where('ID_UTILISATEUR', '=', $id)
                            ->exists();
            
            $reponse ? $reponse = true : $reponse = false;

            return $reponse;
        }


        public function modifierInfos($id, $nom, $prenom, $telephone)
        {
            if($id != null && $nom != null && $prenom != null && $telephone != null)
            {
                DB::table('utilisateur')
                    ->where('ID_UTILISATEUR', '=', $id)
                    ->update(['NOM_UTILISATEUR' => $nom, 'PRENOM_UTILISATEUR' => $prenom, 'TEL_UTILISATEUR' => $telephone ]); 
                                
            }
            else
            {
                return null;
            }
        }

        public function SuppCompte($id)
        {
            if($id != null)
            {
                DB::table('utilisateur')
                    ->where('ID_UTILISATEUR', '=', $id)->delete();
            }
        }
    }