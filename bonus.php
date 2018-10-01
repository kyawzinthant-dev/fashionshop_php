<?php
require 'config.php';

$conn = connect();

$cid = $_GET['id'];
$bonus = $_GET['per'];

$query = "UPDATE deposit SET total_deposit=total_deposit+(total_deposit*'$bonus'/100) WHERE c_id='$cid'";

$conn->exec($query);

header("location:deposit.php");

?>