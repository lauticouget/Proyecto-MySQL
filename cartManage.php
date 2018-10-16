<?php
session_start();
require 'loader.php';

// Añadir al carrito


if ($_POST['addToCart']){
    $product = $db->bringProduct($_POST['id']);

    $_SESSION['cart']['products'][] = $product;

    header('location: products.php');
}else{
    header('location: index.php');
}


// Sacar del Carrito

if($_POST){
    dd($cart);
}