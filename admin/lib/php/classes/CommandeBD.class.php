<?php

class CommandeBD extends Commande
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function ajout_commande($quantite,$id_client,$id_produit)
    {
        try {
            $query = "insert into commande (prix,quantite,id_client,id_produit) values ((select prix from produit where id_produit= :id_produit) * :quantite, :quantite, :id_client, :id_produit)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':quantite',$quantite);
            $_resultset->bindValue(':id_client', $id_client);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

    }

}