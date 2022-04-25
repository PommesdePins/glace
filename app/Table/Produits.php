<?php


namespace App\Table;


use App\Database;

class Produits
{
    private Database $query;

    /**
     * @var Database
     */
    public function __construct()
    {
        $this->query = new Database("glace");

    }

    public function getProduit()
    {
        $op = $this->query->query('SELECT * FROM produits', \App\Table\Produits::class);
        return $op;
    }

    public function getProduitById($id)
    {
        $op = $this->query->prepare("SELECT * FROM produits WHERE id = :id", [':id' => $id], \App\Table\Produits::class, true);
        return $op;
    }

    public function getProduitByCateg($categorie)
    {
        $op = $this->query->prepare("SELECT * FROM produits pr  JOIN categorie_has_produits cp ON pr.id = cp.produits_id
                                            JOIN categorie ca ON cp.categorie_id = ca.id WHERE  ca.libelle = :categ", [':categ' => $categorie], \App\Table\Produits::class);
        return $op;
    }

    public function countElement($point)
    {
        $countE = $this->query->prepare('SELECT COUNT(*) FROM produits pr
                                            JOIN categorie_has_produits cp ON pr.id = cp.produits_id
                                            JOIN categorie ca ON cp.categorie_id = ca.id
                                            WHERE ca.libelle = :point;', ['point' => $point], Produits::class, true);
        return $countE;
    }



    public function countElementFilter()
    {
        if (!isset($_POST['saveur'])) {
            $count = $this->query->prepare('SELECT COUNT(*) FROM produits', [], Produits::class, true);
        } else {
            $count = $this->countElement($_POST['saveur']);
        }
        return $count;
    }

    public function saveur()
    {
        if (!isset($_POST['saveur'])) {
            $item = "Shop";
        } else {
            $item = ucfirst($_POST['saveur']);
        }
        return $item;
    }

    public function shop()
    {
        if (isset($_POST['saveur'])) {
            $res = $this->getProduitByCateg($_POST['saveur']);
        } else {
            $res = $this->getProduit();
        }
        return $res;
    }
}