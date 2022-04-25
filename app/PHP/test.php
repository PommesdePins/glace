<?php

use App\Table\Produits;

$produit = new Produits();
$panier = new \App\Table\Panier();
//var_dump($produit);
//for ($i = 1; $i <= 3; $i++) {
//    $getProduit = $produit->getProduit($i);
//
//    echo $getProduit->prix;
//}


//$uneCateg = $db->query('SELECT libelle FROM categorie WHERE parent_id = 2', Produits::class);
//$key = "COUNT(*)";
//
//foreach ($uneCateg as $categorie) {
//
//    $nbrCateg = $produit->countElement($categorie->libelle);
//    echo ucfirst($categorie->libelle)."(".($nbrCateg->$key).")<br>";
//}
//
//
//$test=$produit->countElementFilter();
//echo $test->$key;
//unset($_SESSION);
//$values = ['prix' =>'54€','quantite'=>'4','id'=> '1'];
//$values2 = ['prix' =>'50€','quantite'=>'40','id'=> '12'];
//
//$_SESSION['panier'] = $values;
//$_SESSION['panier2'] = $values2;
////var_dump($_SESSION['panier']);
////unset($_SESSION['panier']);
//var_dump($_SESSION['panier']['prix']);
//
//if ($_SESSION['']){
//
//}
$_SESSION['eric']['oswald'] = [1];
var_dump($_SESSION['eric']['oswald']++);