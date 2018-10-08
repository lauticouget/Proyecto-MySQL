<?php
include('loader.php');
Session::logout();
header('location:login.php');