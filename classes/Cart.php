<?php 



class Cart 

{

    private  $user;
    private  $products;

    public function __construct(User $user)
    {
        $this->user= $user;
        $this->products= [];
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }


    
}


if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
}elseif(isset($user)){
    $cart=new Cart($user);
}

