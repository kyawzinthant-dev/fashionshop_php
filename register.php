<?php
 require 'config.php';

 $conn = connect();

 if(isset($_POST['terms']))
 
 	{
 	 	$name = $_POST['uname'];
 		$phnum = $_POST['phnum'];
 		$email = $_POST['email'];
 		$payment = $_POST['payment'];
 		$password = $_POST['password'];
 		$nic = $_POST['nic'];
 		$found = $_POST['found'];
 		$address = $_POST['address'];
 		$fav = $_POST['fav'];
 		$zip = $_POST['zip'];
 		$gender = $_POST['gender'];
 		$image = $_FILES['image']['tmp_name'];

try{
		$numofrow=0;
		$sql="select * from customer";
		foreach ($conn->query($sql) as $row) {
			$numofrow++;
		}
		$numofrow+=1;
		$filename=basename($_FILES['image']['name']);
		$ext=strpos($filename,'.')+1;
		$ext=substr($filename,$ext);
		$imagefilename=$numofrow.".".$ext;
		echo $imagefilename;
		move_uploaded_file($image,"image/user/$imagefilename");
		$sql="insert into customer (c_name,c_password,c_email,c_address,c_zipcode,c_phonenumber,c_payment,c_nic,c_found,c_fav,c_gender,c_photo) values('$name','$password','$email','$address','$zip','$phnum','$payment','$nic','$found','$fav','$gender','$imagefilename')";
		$conn->exec($sql);

		$sql="select c_id from customer where c_email='$email'";
		foreach ($conn->query($sql) as $row) {
			$cid=$row['c_id'];
		}

		$sql="insert into deposit (total_deposit,c_id) values ('0','$cid')";
		$conn->exec($sql);


	}
	catch (PDOException $e)
	{
			echo $e->getMessage();
	}
}
		
 	
 
 else

 	header("location:signup.php?error=1");


?>