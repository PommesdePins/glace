<?php
$query = new \App\Database("glace");
$res = $query->prepare('SELECT * FROM produits WHERE nom = ?', array(htmlspecialchars($_GET['produit'])), \App\Table\Produits::class, true);
$categ = $query->prepare('SELECT ca.libelle FROM categorie as ca 
JOIN categorie_has_produits cp ON ca.id = cp.categorie_id
JOIN produits as pr ON cp.produits_id = pr.id
WHERE pr.nom = ?', [$_GET['produit']], \App\Table\Produits::class);
?>

<div class="produit_unit_main">
    <div class="produit_unit_bloc">
        <div class="produit_unit_pic"><img src="<?= ROOT_URL . $res->image ?>" alt=""></div>
        <div class="produit_unit_content">
            <h1><?= $res->nom ?></h1>
            <p><?= "€" . $res->prix ?></p>
            <p><?= $res->libelle ?></p>
            <button class="add"> Ajouter au panier</button>

            <div class="produit_unit_accordion  accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="produit_unit_accordion-button accordion-button" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Description
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?= $res->description ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="produit_unit_categ">
                <b>Categorie :</b><?php
                $tailleCategTab = count($categ);
                $counter = 1;
                foreach ($categ as $categNom) {

                    if ($counter == $tailleCategTab) { ?>
                        <span> <?= " " . $categNom->libelle . ". "; ?></span><?php
                    } else {
                        ?>

                        <span> <?= " " . $categNom->libelle . ", "; ?></span>
                    <?php }
                    $counter++;
                } ?>
            </div>
        </div>
    </div>
</div>