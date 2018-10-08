<?php

require 'loader.php';


if ($_POST){
    $product= new Product ($_POST['name'], $_POST['price'], $_POST['category'], $_POST['imageExt']);
    $product->setId($_POST['id']);
    $cart->setProducts($product);
    
    Session::updateCart($cart);
    
    header('location: products.php');
}else{
    header('location: index.php');
}