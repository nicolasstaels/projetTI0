<?php
if(!isset($_SESSION['user'])){
    print "Accès réservé au client";
    session_destroy();
    ?>
    <meta http-equiv="refresh": content="2;URL=./index_.php">
    <?php
}
