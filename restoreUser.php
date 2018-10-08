<?php 
include_once('classes/Json.php');



if($_POST)

    {
        Json::restoreUser($_POST['restoreUser']);
        header('location: admin.php');
    }

?>