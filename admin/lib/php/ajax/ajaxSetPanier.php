<?php
session_start();
header('Content-type:application/json');
/*
 * inclure les fichiers nécessaire à la communication avec la BD car on ne passe pas par l'index
 * Ce fichier est appelé par fonctions_jquery.js
 */
//A partir de admin/lib/php/ajax ,revenir dans admin/lib/php
include('../pg_connect.php');
include('../classes/Connexion.class.php');
include('../classes/Commande.class.php');
include('../classes/CommandeBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);

$pr = array();
$commande = new CommandeBD($cnx);
extract($_GET,EXTR_OVERWRITE);
var_dump($_GET);
print "session : ".$_SESSION['id'];
$cm[] = $commande->ajout_commande($quantite,$_SESSION['id'],$id_produit);

//converstion du tableau PHP au format javascript
print json_encode($pr);