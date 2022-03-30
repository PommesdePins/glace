<?php

require '../app/Autoloader.php';
//require 'vendor/autoload.php';

\App\Autoloader::register();

include('./../setEnv.php');

$db = new \App\Database('glace');

$tabPage = ["l404","glace","test","shop","produit","panier"];


 function exist(array $tableauExiste,string $get,string $defaultGateway){

    if (isset($_GET[$get])) {
        $pageExiste = false;
        $p= 0;
        foreach ($tableauExiste as $page) {



            if ($page == $_GET[$get]) {
                $pageExiste = true;
            }

        }

        if ($pageExiste) {

            $p = htmlspecialchars($_GET[$get]);
        } else {

            header('Location:l404');
        }
    } else {
        $p = $defaultGateway;
    }
    return $p;

}

$p = exist($tabPage,"p","glace");


$frontController = new \App\Controller\FrontController();

if (method_exists($frontController,$p )) {

    $content = $frontController->$p();
    echo $content;
    exit;
}






