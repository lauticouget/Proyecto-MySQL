<?php 
require 'Base.php';
require 'PDOmaker.php';


class MySQL extends Base
{
    private $conection;

    public function __construct()
    {
        $this->conection=PDOmaker::makePDO();
        
    }

    public function saveUser($user)
    {

    
        $name=$user->getName();
        $username=$user->getUsername();
        $password=$user->getPassword();
        $email=$user->getEmail();
        $role=$user->getRole();


        $query = "INSERT INTO `users` VALUES (NULL, :name, :username, :password, :email, :role)";
        $stmnt=$this->conection->prepare($query);
        //dd($this->conection->prepare('sarasa')->bindParam());

        $stmnt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmnt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmnt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmnt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmnt->bindParam(":role", $role, PDO::PARAM_STR);

        $stmnt->execute();
    }

    public function index($table)
    {
    $query = "SELECT * FROM {$table}";

    $stmnt = $this->conection->prepare($query);

    $stmnt->execute();

    $usersArray = $stmnt->fetchAll(PDO::FETCH_ASSOC);
    
    return $usersArray;
    }

    public function findUser(array $data)
    {

        $query= "SELECT * FROM users WHERE username = :username";

        $stmnt=$this->conection->prepare($query);

        $stmnt->bindParam(":username", $data['username'], PDO::PARAM_STR);

        $stmnt->execute();

        $userArray = $stmnt->fetch(PDO::FETCH_ASSOC);
        
        return $userArray;
    }

    public function eraseUser($username)
        {
            $query = "DELETE FROM users WHERE users.username = :username";

            $stmnt = $this->conection->prepare($query);

            $stmnt->bindParam(":username", $username, PDO::PARAM_STR);
            
            $stmnt->execute();

        }
    public function restoreUser($data)  
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
    
    
    public function saveProduct($productObj)
    {
        $name=$productObj->getName();
        $price=$productObj->getPrice();
        $category=$productObj->getCategory();
        $imageExt = $productObj->getImageExt();
        $imageRoot = $productObj->getImageRoot();

        $query = "INSERT INTO products VALUES(NULL, :name, :price, :category_id, :image_ext, :image_root)";

        $stmnt = $this->conection->prepare($query); 

        $stmnt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmnt->bindParam(":price", $price, PDO::PARAM_INT);
        $stmnt->bindParam(":category_id", $category, PDO::PARAM_INT);
        $stmnt->bindParam(":image_ext", $imageExt, PDO::PARAM_STR);
        $stmnt->bindParam(":image_root", $imageRoot, PDO::PARAM_STR);
        
        $stmnt->execute();

    }

}



























?>