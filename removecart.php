<?php
require 'config.php';

    $conn = connect();

    $remid = $_GET['id'];

    session_start();
    
    unset($_SESSION['item'][$remid]);

    header("location:addtocart.php");


?>

