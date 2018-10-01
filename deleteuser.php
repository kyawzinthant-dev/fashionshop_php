<?php
require 'config.php';

$conn = connect();

$cid=$_GET['id'];

$query="delete from customer where c_id='$cid'";

$conn->exec($query);

header("location:manageuser.php");

?>