<?php
 require 'config.php';

 $conn = connect();

$cid=$_GET['id'];

$query = "select * from customer where c_id='$cid'";

$result = get($query,$conn);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		img
		{
			width: 250px;
			height: 250px;
			border-radius: 100px;
		}
		table tr td
		{
			padding: 20px;
			color: white;
		}
	</style>
</head>
<body style="background: grey">
<?php while($row=$result->fetch()): ?>
<div style="text-align: center;">
<img src="image/user/<?php echo $row['c_photo'] ?>"></div>
	<table style="margin: 0 auto">
		<tr><td>Name: </td><td><?php echo $row['c_name']; ?></td></tr>
		<tr><td>Email: </td><td><?php echo $row['c_email']; ?></td></tr>
		<tr><td>Address: </td><td><?php echo $row['c_address']; ?></td></tr>
		<tr><td>NIC Number: </td><td><?php echo $row['c_nic']; ?></td></tr>
		<tr><td>Payment: </td><td><?php echo $row['c_payment']; ?></td></tr>
		<tr><td><a href="manageuser.php" class="btn btn-danger">Back</a></td></tr>
	</table>
	
</div>

<?php endwhile; ?>
</body>
</html>