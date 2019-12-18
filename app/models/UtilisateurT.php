<?php
namespace App\models;

class UtilisateurT implements \JsonSerializable
{

    private $id_utilisateur;
    private $id_typeUtilisateur;

    private $mail_utilisateur;

    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $tel_utilisateur;

    private $pseudo_utilisateur;
    private $motdepasse_utilisateur;
    private $lvl_utilisateur;

    private $exp_utilisateur;

    private $img_utilisateur;


    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id) {
        $this->id_utilisateur = $id;
    }


    public function getId_typeUtilisateur() {
        return $this->id_typeUtilisateur;
    }
    public function setId_typeUtilisateur($idType) {
        $this->id_typeUtilisateur = $idType;
    }


    public function setMail_utilisateur($mail_visiteur)
    {
        $this->mail_utilisateur = $mail_visiteur;
    }
    public function getMail_utilisateur()
    {
        return $this->mail_utilisateur;
    }


    public function setNom_utilisateur($nom_visiteur)
    {
        $this->nom_utilisateur = $nom_visiteur;
    }
    public function getNom_utilisateur()
    {
        return $this->nom_utilisateur;
    }


    public function setPrenom_utilisateur($prenom_visiteur)
    {
        $this->prenom_utilisateur = $prenom_visiteur;
    }
    public function getPrenom_utilisateur()
    {
        return $this->prenom_utilisateur;
    }


    public function setTel_utilisateur($tel_visiteur)
    {
        $this->tel_utilisateur = $tel_visiteur;
    }
    public function getTel_utilisateur()
    {
        return $this->tel_utilisateur;
    }


    public function setPseudo_utilisateur($pseudo_visiteur)
    {
        $this->pseudo_utilisateur = $pseudo_visiteur;
    }
    public function getPseudo_utilisateur()
    {
        return $this->pseudo_utilisateur;
    }


    public function setLvl_utilisateur($lvl_visiteur)
    {
        $this->lvl_utilisateur = $lvl_visiteur;
    }
    public function getLvl_utilisateur()
    {
        return $this->lvl_utilisateur;
    }


    public function setExp_utilisateur($exp_visiteur)
    {
        $this->exp_utilisateur = $exp_visiteur;
    }
    public function getExp_utilisateur()
    {
        return $this->exp_utilisateur;
    }




    public function setMotdepasse_utilisateur($pwd_visiteur)
    {
        $this->motdepasse_utilisateur = $pwd_visiteur;
    }
    public function getMotdepasse_utilisateur()
    {
        return $this->Motdepasse_utilisateur;
    }

    public function setImg_utilisateur($img_visiteur)
    {
        $this->img_utilisateur = $img_visiteur;
    }
    public function getImg_utilisateur()
    {
        return $this->img_utilisateur;
    }

    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}