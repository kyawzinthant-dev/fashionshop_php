<?php
	require 'config.php';

    $conn = connect();

    $uname = $_POST['uname'];
    $upassword = $_POST['upassword'];


    if($uname=="admin"&&$upassword=="admin")
    {
        header("location:admin.php");
    }
    else
    {

    $query = "SELECT * FROM customer WHERE c_name='$uname' AND c_password='$upassword'";

    $result=get($query,$conn);

    $res = $result->rowCount();

    if($res)
    {
    	session_start();
    	$_SESSION['user']=$uname;
    	header("location:index.php");
    }
    else
    	header("location:login.php?wrong=1");
}
?>