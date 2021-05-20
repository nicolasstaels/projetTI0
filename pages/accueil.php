<div class="container">
    ACCUEIL
    <?php
    if(isset($_SESSION['user']))
        print "user:" . $_SESSION['user'];

    ?>
</div>