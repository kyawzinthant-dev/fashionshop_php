<?php
require 'config.php';

    $conn = connect();
    $itemid = $_GET['id'];

$sql = "DELETE FROM item WHERE item_id='$itemid'";

$conn->exec($sql);


header("location:itemmanage.php");

?>