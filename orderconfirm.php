<?php
require 'config.php';

    $conn = connect();

    session_start();
    if(isset($_SESSION['user']))
    {
    $login=1;
    $username=$_SESSION['user'];
    $query = "select c_id from customer where c_name='$username'";
    $result = get($query,$conn);
    while($row=$result->fetch()):
    $cid=$row['c_id'];
    endwhile;

    $query = "select * from deposit where c_id='$cid'";
    $result = get($query,$conn);
    while($row=$result->fetch()):
    $deposit=$row['total_deposit'];
    endwhile;
  }
  else
  {
    header("location:index.php");
  }

  $date = date('Y-m-d');
  $i=0;
  foreach ($_SESSION['item'] as $key=>$value) {
      
      $itemid[$i]=$key;
      $i++;
    }

    $item=0;
    for($i=0;$i<sizeof($itemid);$i++)
    {
      $getquantity="quantity".$itemid[$i];
      if(isset($_GET[$getquantity]))
      {$quantity[$item]=$_GET[$getquantity];
      $item++;
      }
    }

    $j=0;

  $i=0;
         foreach ($_SESSION['item'] as $key=>$value)
         {
         $sql = "SELECT * FROM item WHERE item_id='$key'";
         $result=get($sql,$conn);
         
         while($row=$result->fetch()):
          $itemrealprice[$key]=$row['item_price']-(($row['item_price']*$row['item_discount']))/100;
         $itemprice[$j]=$quantity[$i]*$itemrealprice[$key]."<br>";
         $i++;
         $j++;
         endwhile;
         }
        
  $itemtotalprice=0;
 for($i=0;$i<sizeof($itemprice);$i++)
  $itemtotalprice+=intval($itemprice[$i]);
     
   $itemtotalquantity=0;
 for($i=0;$i<sizeof($quantity);$i++)
 {
  $itemtotalquantity+=intval($quantity[$i]);  
  $itemcount[$i]=intval($quantity[$i]);
}




?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/styleweb.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 style="display: block;text-align: center;">Your Pay Slid</h1>
  <table id="slid">
    <th>Total Quantity</th>
    <th>Total Price</th>
    <th>Date</th>
    <tr><td><?php echo $itemtotalquantity; ?></td>
    <td>$<?php echo $itemtotalprice; ?></td>
    <td><?php echo $date; ?></td></tr>
  </table>

 <?php

        if($deposit>=$itemtotalprice)
        {

          $query = "INSERT INTO orderlist(order_date,order_total_price,order_quantity,c_id) VALUES ('$date','$itemtotalprice','$itemtotalquantity','$cid')";
          $conn->exec($query);


        $query = "UPDATE deposit SET total_deposit=total_deposit-$itemtotalprice WHERE c_id='$cid'";
         $conn->exec($query);
        $i=0;
        foreach ($_SESSION['item'] as $key=>$value)
         {
         $sql = "SELECT * FROM item WHERE item_id='$key'";
         $result=get($sql,$conn);
         
    
         while($row=$result->fetch()):
         $query = "UPDATE item SET item_sale_count=item_sale_count+1 WHERE item_id='$key'";
         $conn->exec($query);
         $query = "UPDATE item SET item_total=item_total-$itemcount[$i] WHERE item_id='$key'";
         $conn->exec($query);
         $i++;
         endwhile;
         


         }
        ?>
        <p id="alert" style="color:white;margin-top: 10px;
font-size: 20px; text-shadow: 0 0 10px white;">$<?php echo $itemtotalprice; ?> has been deducted from Deposit.</p>

        <?php
         session_destroy();

         session_start();
         $_SESSION['user']=$username;
        }

        else
        {
          echo "<p id='alert' style='color:red;margin-top: 10px;
font-size: 20px; text-shadow: 0 0 10px white;'>Not enough Deposit, Please deposit first!</p>";
        }

      
    ?>



<a href="index.php" class="btn btn-success">Back to Home</a>
</div>
</body>
 
   

</html>