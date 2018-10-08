<?php
require 'Base.php';
 class Json extends Base
{

    public static function createUser($data)
    {
        $user=[
            'name'=> $_POST['name'],
            'username'=> $_POST['username'],
            'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
            'email'=> $_POST['email'],
            'role' => 1
        ];
        $user['id']=Json::generateId();
        return $user;
    }

    public static function generateId()
    {
        $file= file_get_contents('users.json');

        if($file == ""){
            return 1;
        }

        $users=explode(PHP_EOL , $file);
        array_pop($users);
        $lastUser=$users[count($users)-1];
        $lastUser=json_decode($lastUser, true);
        
        return $lastUser["id"]+1 ;
        
    }

    public static function saveUser($user)
    {
        $jsonUser=json_encode($user);
        file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
        
    }

    public static function eraseUser($data)
        {
            $users=Json::decodeUsers();
            $data=trim($data);
            foreach($users as $user)
                {
                    if($user['username'] == $data)
                        {
                            $deletedUser=$user;
                            $jsonDeletedUser=json_encode($user);
                            file_put_contents('deleted.users.json', $jsonDeletedUser . PHP_EOL, FILE_APPEND);
                            unset($user);
                        }    
                    if(isset($user))
                        {
                            $jsonUser=json_encode($user);
                            $jsonUsers[]=$jsonUser;
                        }
                }
            if (count($jsonUsers) > 0)
                {
                    $fullJson=implode(PHP_EOL, $jsonUsers);
                    file_put_contents('users.json', $fullJson . PHP_EOL);
                }else{
                    file_put_contents('users.json', "");
                }
            
        }
    public static function restoreUser($data)  
    {
        $jsonDeletedUser = "";
        $jsonDeletedUsers = [];

        $deletedUsers=Json::decodeDeletedUsers();
        $data=trim($data);
        
        foreach($deletedUsers as $deletedUser)
        {
            if($deletedUser['username'] == $data) {
                $user=$deletedUser;
                $jsonUser=json_encode($user);
                file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
                unset($deletedUser);
            }    
                
            if(isset($deletedUser)) {

                $jsonDeletedUser=json_encode($deletedUser);

                $jsonDeletedUsers[] = $jsonDeletedUser;
                    
            }

        }

        if(count($jsonDeletedUsers) > 0) {

            $fullDeletedJson = implode(PHP_EOL, $jsonDeletedUsers);
            file_put_contents('deleted.users.json', $fullDeletedJson . PHP_EOL);

        } else {

            file_put_contents('deleted.users.json', "");

        }
            
    }

    public static function decodeUsers()
    {
        $jsonFile = file_get_contents('users.json');
        $jsonUsers = explode(PHP_EOL , $jsonFile);
        array_pop($jsonUsers);
        foreach($jsonUsers as $jsonUser)
        { 
            $users[]=json_decode($jsonUser, true);        
        }
        return $users;    
    }
    
    public static function decodeDeletedUsers()
    {
        $users = [];

        $jsonFile = file_get_contents('deleted.users.json');
        $jsonUsers = explode(PHP_EOL , $jsonFile);
        
        array_pop($jsonUsers);

        foreach($jsonUsers as $jsonUser) {
            $users[]=json_decode($jsonUser, true); 
            
        }
        
        return $users;
    }

    public static function findJsonUser($data)
    {
        if(Json::decodeUsers()!= null)
            {
                strpos($data);
            }    
        
    }
    public static function findUserWhitName($data)
    {
        if(Json::decodeUsers()!= null)
            {
                $users=Json::decodeUsers();   
                foreach($users as $user)
                {
                    if($user['username'] == $data)
                    {    
                        return $user;
                        exit;
                    }
                }
            }    
        
    }
    public static function findUser(array $data)
    {
        if(file_get_contents('users.json') != "")
            {
                if(Json::decodeUsers() != null)
                {
                    $users = Json::decodeUsers();   
                    foreach($users as $user)
                    {
                        if($user['username'] == $data['username'])
                        {    
                            return $user;
                            exit;
                        }
                    }
                } 
            }else{
                return null;
            }
        
        
    }
    public static function decodeProducts()
    {
        $productsFile=file_get_contents('products.json');
        $jsonProducts = explode(PHP_EOL , $productsFile);
        array_pop($jsonProducts);
        foreach($jsonProducts as $jsonProduct)
        { 
            $products[]=json_decode($jsonProduct, true);        
        }
        return $products;    
    }
    public static function generateProductId()
    {
        $file= file_get_contents('products.json');

        if($file == ""){
            return 1;
        }

        $products=explode(PHP_EOL , $file);
        array_pop($products);
        $lastProduct=$products[count($products)-1];
        $lastProduct=json_decode($lastProduct, true);
        
        return $lastProduct["id"]+1 ;
        
    }
    public static function saveProduct($productObj)
    {
        $product=[
            'name'=> $productObj->getName(),
            'price'=> $productObj->getPrice(),
            'category'=> $productObj->getCategory(),
            'imageExt'=> $productObj->getImageExt(),
            'imageRoot'=> $productObj->getImageRoot()
        ];
        $product['id']=Json::generateProductId();

        $jsonProduct=json_encode($product);
        file_put_contents('products.json', $jsonProduct . PHP_EOL, FILE_APPEND);
        return $product;
        
    }

}






?>