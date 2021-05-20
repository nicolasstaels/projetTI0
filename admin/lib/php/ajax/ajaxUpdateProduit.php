<?php
header('Content-type:application/json');
/*
 * inclure les fichiers nécessaire à la communication avec la BD car on ne passe pas par l'index
 * Ce fichier est appelé par fonctions_jquery.js
 */
//A partir de admin/lib/php/ajax ,revenir dans admin/lib/php
include('../pg_connect.php');
include('../classes/Connexion.class.php');
include('../classes/Produit.class.php');
include('../classes/ProduitBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);

$pr = array();
$produit = new produitBD($cnx);
//id_produit est un paramètre de l'url
//ds js : var parametre = "id_produit="+id;
extract($_GET,EXTR_OVERWRITE);
$pr[] = $produit->updateProduit($champ,$id,$nouveau);

//converstion du tableau PHP au format javascript
print json_encode($pr);