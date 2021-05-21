<?php
$prod = new ProduitBD($cnx);
if (isset($_GET['id_cat'])) {
    $liste = $prod->getProduitsBycat($_GET['id_cat']);
} else {
    $liste = $prod->getAllProduit();
}
$nbr = count($liste);
?>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            for ($i = 0; $i < $nbr; $i++) {
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./admin/images/<?php print $liste[$i]->photo; ?>" alt="images"/>
                        <div class="card-body">
                            <h3 class="card-title">
                                <?php print $liste[$i]->nom_produit; ?>
                            </h3>
                            <p class="card-text">
                                <?php
                                print $liste[$i]->description;
                                ?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group" id="remove_a">
                                    <button data-id="<?php print $liste[$i]->id_produit;?>" data-bs-toggle="modal" data-bs-target="#info_produit" class="info_produit"> Info </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
        include('./pages/info_produit.php');
        ?>
    </div>
</div>
