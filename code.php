<?php
require 'config.php';

$conn = connect();

$cid = $_GET['id'];
$code = $_POST['code'];


$query = "SELECT * FROM giftcode WHERE code_number='$code'";

$result = get($query,$conn);

while($row=$result->fetch()):	

	$query = "UPDATE deposit SET total_deposit=total_deposit+'$row[amount]' WHERE c_id='$cid'";
	$conn->exec($query);

endwhile;

header("location:deposit.php");

?>

