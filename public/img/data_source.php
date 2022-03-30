<?php

$item1 = [
    'icons' => 'akar-icons:cross',
    'title' => 'Free shipping over €50',
];
$item2 = [
    'icons' => 'mdi:check',
    'title' => '100% organic icecream',
];
$item3 = [
    'icons' => 'mdi:check',
    'title' => 'Money back guarantee',
];
$headers = [$item1, $item2, $item3,];

$menuItem1 = [
    'href' => 'glace',
    'title' => 'Home',
];
$menuItem2 = [
    'href' => 'shop',
    'title' => 'Shop',
];
$menuItem3 = [
    'href' => 'blog',
    'title' => 'Blog',
];
$menuItem4 = [
    'href' => 'about',
    'title' => 'About us',
];
$menuItem5 = [
    'icons' => 'la:shopping-bag',
    'href' => 'iconify',
    'lien' => 'panier',

    'title' => '',
];

$menuItems = [$menuItem1, $menuItem2, $menuItem3, $menuItem4, $menuItem5,];

// Test égalité
// $min1= 5;
// $max2 =5;

// Test min max
// $min3= 12;
// $max4 =7;

$min = 0;
$max = 0;


$product1 = [
        'src' => 'img/2.jpg',
    'description' => 'Mix and match',
    'price' => getPrice($min,$max),
];
$product2 = [
    'src' => 'img/3.jpg',
    'description' => 'Mix and match',
    'price' => getPrice($min,$max),
];
$product3 = [
    'src' => 'img/4.jpg',
    'description' => 'Mix and match',
    // 'price' => '€5 - €8',
    'price' => getPrice($min,$max),    
];
function getPrice($min,$max){
    
    $min = rand(5, 15);
    $max =rand(5, 15);
    
    if ($min == $max) {
        return '€' . $max;
    }
    elseif ($min > $max) {
        return '€' . $max . ' - €' . $min;
    }
    return '€' . $min . ' - €' . $max;
}
$products = [$product1, $product2, $product3];