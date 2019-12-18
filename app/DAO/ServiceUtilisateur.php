<?php

    namespace App\DAO;

    use Illuminate\Support\Facades\Session;
    use Illuminate\DataBase\Eloquent\Model;
    use DB;
    use App\models\Utilisateur;

    class ServiceUtilisateur
    {
        public function listeUtilisateur()
        {
            $liste = DB::table('utilisateur')
            ->select('ID_UTILISATEUR', 'MAIL_UTILISATEUR', 'NOM_UTILISATEUR', 'PRENOM_UTILISATEUR', 'TEL_UTILISATEUR', 'PSEUDO_UTILISATEUR')
            ->orderby('NOM_UTILISATEUR')
            ->get();

            return $liste;
        }

        public function listeImages()
        {
            $liste = DB::table('images')
            ->get();

            return $liste;
        }

        public function ModifierImg($titreImg, $idU)
        {
            DB::table('utilisateur')
                ->where('ID_UTILISATEUR', '=', $idU)
                ->update(['IMAGE_UTILISATEUR' => $titreImg]);
                
        }
    }