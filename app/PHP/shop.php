<?php
$key = "COUNT(*)";

?>
<div> <?= $produit->saveur()?></div>
<div class="produit_filter_bloc" style="display: flex; width:100%; justify-content:center">
    <div class="produit_filter" style="width: 80%;">
        <a class="produit_filter_btn btn " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
           aria-controls="offcanvasExample">
            <span class="iconify" data-icon="akar-icons:settings-horizontal"></span><span>Filter</span></a>
        <span> <?php $test = $produit->countElementFilter();
            echo $test->$key;
            if ($test->$key == 1) {
                echo " Résultat trouvé.";
            } else {
                echo " Résultats trouvés.";
            }
            ?> </span>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel" style="display: flex!important; justify-content:center!important;">
            <div class="offcanvas-header">
                <div></div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="filter_body offcanvas-body">
                <div>
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Catégorie</h5>
                    <form id="categorieForm" method="post">

                        <?php
                        $uneCateg = $db->query('SELECT libelle FROM categorie WHERE parent_id = 2', \App\Table\Categorie::class);
                        foreach ($uneCateg

                        as $categorie) {

                        $nbrCateg = $produit->countElement($categorie->libelle); ?>

                        <div style="flex-direction: ;display: flex;align-items: center;">
                            <input type="radio" id="<?= $categorie->libelle ?>" name="saveur"
                                   value="<?= $categorie->libelle ?>"
                                   onchange="validateRadio();" <?php if (isset($_POST['saveur'])) {
                            if ($_POST['saveur'] == $categorie->libelle) { ?> checked<?php }
                                   }?>
                            >
                            <label for="<?= $categorie->libelle ?>">

                                <span><?= ucfirst($categorie->libelle) . " " ?></span>
                                <span>(<?= ($nbrCateg->$key) . ")</span> "; ?></label></div>

                    <?php
                    }
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="produit_bloc">
    <div class="produit_artcl">

        <?php
        foreach ($produit->shop() as $unProduit) {
            ?>
            <div class="produit_artc"><a href="<?= "produit?produit=" . $unProduit->nom ?>">
                    <img src="<?php echo ROOT_URL . $unProduit->image; ?>">
                    <p><?php echo $unProduit->nom ?>
                        <br> <?php echo "€" . $unProduit->prix ?>
                    </p>

                </a>
            </div>
            <?php
        } ?>
    </div>
</div>
<script type="text/javascript">
    function validateRadio() {
        document.getElementById("categorieForm").submit();
    }
</script>