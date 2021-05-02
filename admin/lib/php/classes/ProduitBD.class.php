<?php

class ProduitBD extends Produit
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function mise_a_jourProduit($id){

    }

    public function ajout_produit(){

    }

    public function getAllProduit()
    {
        $query = "select * from produit order by id_produit";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while ($d = $_resultset->fetch()) {
            $_data[] = new Produit($d);

        }

        return $_data;
    }

    public function getProduitsBycat($id_cat)
    {
        try {
            $query = "select * from produit where id_cat= :id_cat ";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->execute();

            while ($d = $_resultset->fetch()) {
                $_data[] = new Produit($d);
            }
            return $_data;
        } catch (PDOException $e) {
            print "Echec de la requête" . $e->getMessage();
        }
    }
}