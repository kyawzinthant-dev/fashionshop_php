<?php
require 'config.php';

    $conn = connect();

    $id=$_GET['id'];
      
try{
	
		$sql = "DELETE FROM giftcode WHERE code_id='$id'";
		$conn->exec($sql);
		

	}
	catch (PDOException $e)
	{
			echo $e->getMessage();
	}

header("location:managecode.php");
?>