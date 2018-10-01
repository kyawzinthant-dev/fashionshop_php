<?php

	include 'orderconfirm.php';
   
	
        $i=0;
        foreach ($_SESSION['item'] as $key=>$value)
         {
         $sql = "SELECT * FROM item WHERE item_id='$key'";
         $result=get($sql,$conn);
         
    
         while($row=$result->fetch()):
         echo "i value =".$i."<br>";
         $query = "UPDATE item SET item_sale_count=item_sale_count+1 WHERE item_id='$key'";
         $conn->exec($query);
         $query = "UPDATE item SET item_total=item_total-$itemcount[$i] WHERE item_id='$key'";
         $conn->exec($query);
          $i++;
         endwhile;
        

         }


  
?>