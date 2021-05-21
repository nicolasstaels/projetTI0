<?php

class ClientBD extends Client
{
    private $_db; //recevoir la valeur de $cnx lors de la connexion à la BD dans l'index
    private $_data = array();
    private $_resultset;

    public function __construct($cnx)
    { //$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function ajout_client($mail, $prenom, $nom, $tel, $mdp)
    {
        try {
            $query = "insert into client (nom,prenom,mail,tel,password) values ";
            $query .= "(:nom,:prenom,:mail,:tel,:password)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':nom', $nom);
            $_resultset->bindValue(':prenom', $prenom);
            $_resultset->bindValue(':mail', $mail);
            $_resultset->bindValue(':tel', $tel);
            $_resultset->bindValue(':password', md5($mdp));
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

    }

    public function isClient($mail, $password)
    {
        try {
            $query = "select is_Client(:login,:password) as retour";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':login', $mail);
            $_resultset->bindValue(':password', md5($password));//car password crypté en md5
            $_resultset->execute();
            $retour = $_resultset->fetchColumn(0);

            return $retour;
        } catch (PDOException $e) {
            print "Echec " . $e->getMessage();
        }
    }

}
