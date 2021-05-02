<?php

class Categorie{
    private $_attributs = array();

    public function __construct(array $data)
    { //$data est reçu de ThemeBD
        $this->hydrate($data);
    }


    public function hydrate(array $data)
    { //reçu du constructeur
        foreach ($data as $champ => $valeur) { //chaque champ est crée et associé à sa valeur
            $this->$champ = $valeur;
        }
    }

    public function __get($champ)
    { //champ  = clé
        if (isset($this->_attributs[$champ])) {
            return $this->_attributs[$champ];
        }
    }

    public function __set($champ, $valeur)
    {
        $this->_attributs[$champ] = $valeur;
    }


}