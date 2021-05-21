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

    public function getProduitById2($id_produit)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select produit.id_produit,produit.nom_produit,produit.photo,produit.prix,produit.description,produit.stock,categorie.id_cat,categorie.nom_cat from produit,categorie where (produit.id_cat = categorie.id_cat) AND id_produit = :id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit', $id_produit);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json
            $this->_db->commit();

        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }

    }

    public function supprimer_produit($id_produit){
        try {
            $query = "delete from produit where id_produit= :id_produit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    public function mise_a_jourProduit($id_produit, $reference, $nom_produit, $description, $prix, $stock, $id_cat)
    {
        try {
            $query = "update produit set reference= :reference,nom_produit= :nom_produit,prix= :prix,stock= :stock,description= :description ,id_cat= :id_cat where id_produit= :id_produit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }


    }

    public function ajout_produit($nom_produit,$photo, $prix, $stock, $description, $id_cat, $reference)
    {
        try {
            $query = "insert into produit (nom_produit,photo,prix,stock,description,id_cat,reference) values ";
            $query .= "(:nom_produit,:photo,:prix,:stock,:description,:id_cat,:reference)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->bindValue(':photo', $photo);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

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

    //écrire une requête avec paramètres de position(:champ,:id,...) puis bindValue
    public function updateProduit($champ, $id, $valeur)
    {
        try {
            //appeler un procédure embarquée
            $query = "update produit set " . $champ . "= :valeur where id_produit= :id";
            $_resultset = $this->_db->prepare($query);//transformer la requête!
            $_resultset->bindValue(':valeur', $valeur);
            $_resultset->bindValue(':id', $id);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

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

    public function getProduitByref($reference)
    {
        try {
            $this->_db->beginTransaction();
            $query = "select * from produit where reference= :reference";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':reference', $reference);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json
            $this->_db->commit();

        } catch (PDOException $e) {
            print "Echec de la requête : " . $e->getMessage();
            $_db->rollback();
        }

    }
}