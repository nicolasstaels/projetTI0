<?php
include ('./lib/php/verifier_connexion.php');
$prod = new ProduitBD($cnx);
$liste= $prod->getAllProduit();
$nbr=count($liste);
if (isset($_GET['supprimer'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (!empty($id_produit)) {
    $prod->supprimer_produit($id_produit);
    print "Produit supprimé";
    ?>
        <meta http-equiv="refresh": content="0;URL=/admin/index_.php?page=gestion_produits.php">
        <?php
    }
}
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">Stock</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for($i=0;$i<$nbr;$i++){
        ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_produit;?>
            </th>
            <td>
            <span contenteditable="true" name="nom_produit" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->nom_produit;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="description" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->description;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="prix" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->prix;?>
            </span>
            </td>
            <td>
            <span contenteditable="true" name="stock" id="<?php print $liste[$i]->id_produit;?>">
            <?php print $liste[$i]->stock;?>
            </span>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <form class="row g-3" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formsuppbyid" method="get">
        <div class="col-md-6">
            <label for="id_produit" class="form-label">id produit à supprimer</label>
            <input type="number" class="form-control" id="id_produit" name="id_produit">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" id="supprimer" name="supprimer">Supprimer</button>
        </div>
    </form>
</table>
