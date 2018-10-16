<?php
class Creator
{
    public static function createDB()
    {
        $db = new MySQL();
        return $db;
    }

    public static function createUser($db)
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != 'guest'){
            $userArray = $db->findUser($_SESSION);
            $user = new User($userArray['username'], $userArray['role']);
            return $user;
        }else{
            $userArray = ['guest', 1];
            $user = new User ($userArray[0], $userArray[1]);
            return $user;
        }
    }


    public static function createProducts($db)
    {
        $products = $db->index('products');
        return $products;

    }

    public static function createCart($user, $products = [])
    {
        if(isset($_SESSION['cart'])){
            $cart = new Cart ($user, $_SESSION['cart']['products']);
        }else{
            $cart = new Cart($user);
        }
        return $cart;
    }


    public static function createProduct($id, $db)
    {
        $array = $db->bringProduct($id);

        $product = new Product ($array['name'], $array['price'], $array['category_id'], $array['image_ext'], $array['id']);

        return $product;
    }


}

 //------------------------------------- CREATED -----------------------------------------------
Session::guestController();

$db = Creator::createDB();

$user = Creator::createUser($db);

$products = Creator::createProducts($db);

$cart = Creator::createCart($user);


Session::sessionCart($cart);






