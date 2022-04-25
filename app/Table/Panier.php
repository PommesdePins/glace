<?php


namespace App\Table;


use App\Database;

class Panier
{
    private Database $query;


    public function __construct()
    {
        $this->query = new Database("glace");
//        var_dump($_SESSION);

    }

    public function getProduit($id)
    {

        return $this->query->prepare('SELECT * FROM produits WHERE id = :id', ['id' => $id], Panier::class, true);
    }

    public function deleteRow($id)
    {
        unset($_SESSION['panier'][$id]);
    }

    function add($idProduit)
    {
        $produit = $this->getProduit($idProduit);
        $values = ['prix' =>$produit->prix,'quantite'=>'1','id'=> $idProduit];
        $_SESSION['panier'][$idProduit] = $values;

    }

    public function getImg($id)
    {

        return $this->query->prepare('SELECT image FROM produits WHERE id = :id', ['id' => $id], Panier::class, true);
    }

    public function getPrix($id)
    {
        return $this->query->prepare('SELECT prix FROM produits WHERE id = :id', ['id' => $id], Panier::class, true);
    }

    public function getNom($id)
    {
        return $this->query->prepare('SELECT nom FROM produits WHERE id = :id', ['id' => $id], Panier::class, true);
    }

}