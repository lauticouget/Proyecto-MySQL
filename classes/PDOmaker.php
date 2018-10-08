<?php 

class PDOmaker 
{
    public static function makePdo()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=Punto_Vet;port=3306;charset=utf8mb4", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $pdo;

        } catch (PDOException $e){
            echo $e->getMessage();
            //die('No pude conectarme');
        }
    }
}