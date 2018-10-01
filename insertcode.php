<?php
require 'config.php';

    $conn = connect();

    echo $code = $_POST['code'];
     echo $amount = $_POST['amount'];
      
try{
	
		$sql = "INSERT INTO giftcode(code_number,amount) VALUES ('$code','$amount')";
		$conn->exec($sql);
		

	}
	catch (PDOException $e)
	{
			echo $e->getMessage();
	}

header("location:managecode.php");
?>