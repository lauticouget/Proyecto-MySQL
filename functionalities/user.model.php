<?php
if($_POST){
    switch($_POST['controll']){
        case 'register':
            $user = new User($_POST['name'], $_POST['username'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), 1);
            return $user;
            break;
    
        case 'login':
            $user = new User($_POST['username'], $_POST['password']);
            return $user;
            break;
    };
}
?>