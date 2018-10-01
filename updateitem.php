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
            $icount = $_POST['icount'];


$itemid = $_GET['id'];



$sql = "UPDATE item SET item_name='$iname',item_price='$iprice',item_discount='$idiscount',item_type='$itype',item_category='$icate',item_description='$idescript',item_tag='$itname',item_total='$icount' WHERE item_id='$itemid'";

$conn->exec($sql);

header("location:itemmanage.php");
                    ?>