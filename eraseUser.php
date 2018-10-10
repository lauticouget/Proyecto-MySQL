<?php
session_start(); 
include_once('loader.php');



if($_POST)
    { 
        if($_SESSION['username'] != (trim($_POST['eraseUser']))){
                $db->eraseUser($_POST['eraseUser']);   
                header('location: admin.php');
            }else
            {
                header('location: admin.php');
            } 
    }





?>