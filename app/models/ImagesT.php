<?php
namespace App\models;

class ImagesT implements \JsonSerializable
{

    private $id_img;
    private $titre_img;


    public function getId_img() {
        return $this->id_img;
    }
    public function setId_img($id) {
        $this->id_img = $id;
    }


    public function getTitre_img() {
        return $this->id_img;
    }
    public function setTitre_img($id) {
        $this->titre_img = $idType;
    }

    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}