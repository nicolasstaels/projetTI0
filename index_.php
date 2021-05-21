<!doctype html>
<?php
//index public
session_start();
include('./admin/lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $password);
?>
<html>
<head>
    <title>Site 2021</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
            integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./admin/lib/css/style.css"/>
    <link rel="stylesheet" href="./admin/lib/css/custom.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./admin/lib/js/fonctions_jquery.js"></script>

</head>

<body>
<div id="page" class="container">
    <header class="img_header">
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <a href="./admin/index_.php?page=disconnect.php">Déconnexion</a>
        <?php } ?>
        <img src="./admin/images/banner_fleur.jpg" id="banniere_image" class="img-fluid" alt="...">
    </header>
    <section id="colGauche">
        <nav>
            <?php
            $path = "./lib/php/public_menu.php";
            if (file_exists($path)) {
                include($path);
            }

            ?>
        </nav>
        <!--
        <aside id="label">
            <img src="./images/label.jpg" alt="label qualit�"/>
        </aside>
        -->
    </section>
    <section id="contenu">
        <div id="main">
            <?php
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "accueil.php";
            }

            if (
            isset($_GET['page'])) {
                //si on a un param page dans l'url
                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./pages/" . $_SESSION['page'];
            //print("path:" . $path . "<br>");
            if (file_exists($path)) {
                //print("cc");
                include($path);
            } else {
                include("./pages/page404.php");
            }
            ?>
        </div>
        <!--
        <aside id="pub">
            <img src="./images/pub.jpg" alt="publicité"/>
        </aside>
        -->
    </section>

</div>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <?php
        if (file_exists('./lib/php/public_footer.php')) {
            include('./lib/php/public_footer.php');
        }
        ?>
    </div>
</footer>

</body>
</html>
