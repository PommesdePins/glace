<?php
$produit = new \App\Database("glace");
$panier = new \App\Table\Panier();
//$panier = $produit->query('SELECT * FROM produits_has_commande', \App\Table\Produits::class);//where id = id commandeur

?><a href="<?php $panier->add(1); ?>"> add <br></a>

<?php

?><a href="deconnexion"> deco <br></a>
    <h1>Panier</h1><?php
if (!isset($_SESSION['user'])) {
    header('Location:login');
}
//unset($_SESSION['panier']);
if (empty($_SESSION['panier'])) {
    echo "votre panier est vide ";
} else {
//    var_dump($_SESSION['panier']);
    ?>
    <div class="panier_bloc">
        <table>
            <tr>
                <th></th>
                <th>Article</th>
                <th>Nom</th>
                <th>Prix/U</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
            <?php

            foreach ($_SESSION['panier'] as $lignePanier) {
            ?>
            <tr>
                <div class="panier_ligne">
                    <!--                    <td><a onclick="-->
                    <?php //$panier->deleteRow($lignePanier['id']); ?><!--"><span class="iconify"-->
                    <td><a onclick="<?php ?>"><span class="iconify"
                                                    data-icon="fluent:delete-28-filled"></span></a></td><?php
                    $res = $panier->getProduit($lignePanier['id']);
                    ?>
                    <td><img src="<?= ROOT_URL . ($res->image) ?>"></td>
                    <td><?php echo $res->nom ?></td>
                    <td>  <?php echo "€".$res->prix ?></td>

                    <td> <input type="number" value="<?php echo $lignePanier['quantite'] ?>" required></td>
                    <td><?php echo "€".$res->prix * $lignePanier['quantite']; ?></td><?php

                    }
                    ?>
            </tr>
        </table>
    </div>
    </div>
    <?php
}
function suppr()
{

}

