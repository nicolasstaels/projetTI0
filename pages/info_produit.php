<div class="modal fade" id="info_produit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="id_prod"></h6>
                <h5 class="modal-title" id="infoModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="details_produit">
                </div>
            </div>
            <div class="modal-footer text-center">
                <select name="quantite" id="quantite">
                    <?php
                    for ($z = 1; $z < 21; $z++) {
                        ?>
                        <option id="combien" value="<?php print $z; ?>"><?php print $z; ?></option>
                        <?php
                    }
                    ?>                </select>
                &nbsp;&nbsp;<i class="far fa-hand-point-right fa-3x"></i>
                <?php if (isset($_SESSION['user'])) { ?>
                    <button type="button" class="btn btn-primary dans_panier" id="clic_panier">Commander</button>
                    <?php
                }
                ?>
                <div id="ok"></div>
            </div>
        </div>
    </div>
</div>
