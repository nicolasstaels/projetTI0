<?php

if (isset($_POST['connecter'])) {
    extract($_POST, EXTR_OVERWRITE);
    $cl = new ClientBD($cnx);
    $client = $cl->isClient($mail, $password);
    if ($client != 0) {
        $_SESSION['user'] = $mail;
        $_SESSION['id'] = $client;
        print "Bienvenue " . $_SESSION['user'];
        ?>
        <meta http-equiv="refresh" : content="0.5;URL=./index_.php?page=accueil.php">
        <?php
    } else {
        print "identifiant invalide";
    }

}


?>
<form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formInscription" method="post">
    <div class="col-12">
        <label for="mail" class="form-label">Email</label>
        <input type="text" class="form-control" id="mail" name="mail" placeholder="email">
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="password">
    </div>
    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary" id="connecter" name="connecter">Se connecter</button>
    </div>
</form>
