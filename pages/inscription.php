<?php
$client = new ClientBD($cnx);

if (isset($_GET['inscrire'])) {
    print "test";
    extract($_GET, EXTR_OVERWRITE);

    if (!empty($mail) && !empty($prenom) && !empty($nom) && !empty($tel) && !empty($password)) {
        $client->ajout_client($mail, $prenom, $nom, $tel, $password);
        print "Inscription réussie";
        ?><meta http-equiv="refresh": content="2;URL=index_.php?page=connexion_client.php">
<?php
    }else{
        print "erreur";
    }
}

?>
<h2>Inscription</h2>
<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formInscription" method="get">
    <div class="col-md-6">
        <label for="mail" class="form-label">Mail</label>
        <input type="email" class="form-control" id="mail" name="mail" placeholder="exemple@gmail.com">
    </div>
    <div class="col-12">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Robert">
    </div>
    <div class="col-md-6">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Durand">
    </div>

    <div class="col-12">
        <label for="tel" class="form-label">Tel</label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="024448881475">
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="inscrire" name="inscrire">S'inscrire</button>
    </div>
</form>
