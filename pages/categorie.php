<?php
$cat = new CategorieBD($cnx);
$liste_cat = $cat->getCategorie();
$nbr_cat = count($liste_cat);
?>
<div class="card-group">
        <?php
        for ($i = 0; $i < $nbr_cat; $i++) {
            ?>
            <div class="card">
                <div class="img-wrapper">
                <img src="./admin/images/<?php print $liste_cat[$i]->image; ?>" class="card-img-top" alt="..." id="images_cat">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="index_.php?page=produit.php&id_cat=<?php print $liste_cat[$i]->id_cat; ?>" class="lien">
                            <?php print $liste_cat[$i]->nom_cat; ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php print $liste_cat[$i]->description_cat ?></p>
                </div>
            </div>
            <?php
        }
        ?>