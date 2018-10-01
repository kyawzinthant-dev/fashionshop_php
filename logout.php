<?php
require 'config.php';

    $conn = connect();
session_start();
    session_destroy();
   
    header("location:index.php?login=0");

?>