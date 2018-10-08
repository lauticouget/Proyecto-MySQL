<?php

abstract class Base
{
    
    abstract public static function createUser($data);
    abstract public static function saveUser($data);
    abstract public static function eraseUser($data);
    abstract public static function restoreUser($data);
    abstract public static function findUser(array $data);
  
}

?>