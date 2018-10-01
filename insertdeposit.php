<?php
require 'config.php';

$conn = connect();

$cid = $_GET['id'];
$deposit = $_POST['depo'];

echo $deposit;

$query = "UPDATE deposit SET total_deposit=total_deposit+'$deposit' WHERE c_id='$cid'";

$conn->exec($query);

header("location:deposit.php");

?>