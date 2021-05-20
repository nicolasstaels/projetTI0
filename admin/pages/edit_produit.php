<?php include('lib/php/verifier_connexion.php') ?>


<h2>Editer / ajouter un produit</h2>
<?php
$categ = new CategorieBD($cnx);
$liste = $categ->getCategorie();
$nbr = count($liste);
$produit = new ProduitBD($cnx);
if (isset($_GET['editer_ajouter'])) {
    extract($_GET, EXTR_OVERWRITE);
    if ($_GET['action'] == "editer") {
        ?>
        <pre><?php var_dump($_GET);
        ?></pre><?php
        if (!empty($id_produit) && !empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) && !empty($cat)) {
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            $produit->mise_a_jourProduit($id_produit,$reference, $nom_produit, $description, $prix, $stock,$cat);

        }
    } else if ($_GET['action'] == "inserer") {
        ?>
        <pre><?php var_dump($_GET);     ?></pre><?php


        if (!empty($reference) && !empty($nom_produit) && !empty($description) && !empty($prix) && !empty($stock) && !empty($cat)) {
            print "ici";
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            $photo='photo.jpg';
            $produit->ajout_produit($nom_produit,$photo,$prix, $stock, $description, $cat, $reference);

        }
    }

} ?>


<form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF']; ?>" id="formEditAjout">
    <div class="col-md-2">
        <label for="reference" class="form-label">Référence</label>
        <input type="text" class="form-control" id="reference" name="reference">
    </div>
    <div class="col-md-6">
        <label for="denomination" class="form-label">Dénomination</label>
        <input type="text" class="form-control" id="denomination" name="nom_produit">
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="col-md-2">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock">
    </div>
    <select name="cat" id="cat" >

        <?php
        for($i=0;$i<$nbr;$i++){
            ?>
            <option value="<?php print $liste[$i]->id_cat;?>">
                <?php print $liste[$i]->nom_cat;?>
            </option>
            <?php
        }
        ?>
    </select>

    <div class="col-12">
        <input type="hidden" name="id_produit" id="id_produit">
        <input type="hidden" name="action" id="action">
        <button type="submit" class="btn btn-primary" id="editer_ajouter" name="editer_ajouter">Nouveau ou mettre à
            jour
        </button>
    </div>
</form>
