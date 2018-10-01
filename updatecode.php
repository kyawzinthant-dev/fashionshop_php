<?php
require 'config.php';

    $conn = connect();

    $id=$_GET['id'];
    $code = $_POST['code'];
     $amount = $_POST['amount'];
      
try{
	
		$sql = "UPDATE giftcode SET code_number='$code', amount='$amount' WHERE code_id='$id'";
		$conn->exec($sql);
		

	}
	catch (PDOException $e)
	{
			echo $e->getMessage();
	}

header("location:managecode.php");
?>