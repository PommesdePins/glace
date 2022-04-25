<?php

namespace App\Controller;


class FrontController
{


    public function glace(): string
    {
        ob_start();

        $mainTemplate = ROOT_PROJECT . '/app/PHP/glace.php';

        require ROOT_PROJECT . '/app/PHP/template.php';


        return ob_get_clean();
    }
//
//    public function test(): string
//    {
//        ob_start();
//
//        $mainTemplate = ROOT_PROJECT . '/app/PHP/shop.php';
//
//        require ROOT_PROJECT . '/app/PHP/template.php';
//
//
//        return ob_get_clean();
//    }

    public function shop(): string
    {
        ob_start();

        $mainTemplate = ROOT_PROJECT . '/app/PHP/shop.php';

        require ROOT_PROJECT . '/app/PHP/template.php';


        return ob_get_clean();
    }

    public function produit(): string
    {
        ob_start();


        $mainTemplate = ROOT_PROJECT . '/app/PHP/produit.php';
        require ROOT_PROJECT . '/app/PHP/template.php';


        return ob_get_clean();
    }

    public function panier(): string
    {
        ob_start();


        $mainTemplate = ROOT_PROJECT . '/app/PHP/panier.php';
        require ROOT_PROJECT . '/app/PHP/template.php';


        return ob_get_clean();
    }

    public function login(): string
    {
        ob_start();
        $tabProduit = ["Kiwi Ice Cream"];


        $mainTemplate = ROOT_PROJECT . '/app/PHP/login.php';

        require ROOT_PROJECT . '/app/PHP/template.php';


        return ob_get_clean();
    }


    public function deconnexion()
    {
        ob_start();
        $mainTemplate = ROOT_PROJECT . '/app/PHP/deconnexion.php';

        require ROOT_PROJECT . '/app/PHP/template.php';

        return ob_get_clean();
    }
    public function add()
    {
        ob_start();
        $mainTemplate = ROOT_PROJECT . '/app/PHP/add.php';

        require ROOT_PROJECT . '/app/PHP/template.php';

        return ob_get_clean();
    }

    public function l404()
    {
        ob_start();
        $mainTemplate = ROOT_PROJECT . '/app/PHP/l404.php';

        require ROOT_PROJECT . '/app/PHP/l404.php';

        return ob_get_clean();
    }

    public function test()
    {
        ob_start();
        $mainTemplate = ROOT_PROJECT . '/app/PHP/test.php';

        require ROOT_PROJECT . '/app/PHP/template.php';

        return ob_get_clean();
    }

}