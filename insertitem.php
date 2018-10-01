<?php
require 'config.php';

    $conn = connect();

    $iname = $_POST['iname'];
     $iprice = $_POST['iprice'];
      $idiscount = $_POST['idiscount'];
       $itype = $_POST['itype'];
        $icate = $_POST['icate'];
         $idescript = $_POST['idescript'];
          $itname = $_POST['itname'];
           $image = $_FILES['image']['tmp_name'];
            $icount = $_POST['icount'];

try{
	
		$filename=basename($_FILES['image']['name']);
		move_uploaded_file($image,"image/item/$filename");
		$sql="insert into item(item_name,item_photo,item_price,item_discount,item_rating,item_sale_count,item_type,item_category,item_description,item_tag,item_total) values ('$iname','$filename','$iprice','$idiscount','0','0','$itype','$icate','$idescript','$itname','$icount')";
		$conn->exec($sql);

		

	}
	catch (PDOException $e)
	{
			echo $e->getMessage();
	}

header("location:itemmanage.php");
?>