<?php
$produit = new \App\Database("glace");

$panier =$produit->query('SELECT * FROM produits_has_commande',\App\Table\Produits::class);//where id = id comandeur
//$panier = ['prix' =>'54€','quantite'=>'4','id'=> '1'];
$_SESSION['panier'] = $panier;


if (empty($_SESSION['panier'])){
    echo "votre panier est vide ";
}else{
    echo "contenue";
}