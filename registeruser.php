<?php
 require 'config.php';

 $conn = connect();

$error=0;



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		
		<?php $error=$_GET['error']; ?>
		var error=1;
		if(error==<?php echo $error; ?>)
		{
			alert("Accept Terms and Conditions!");
		}

	</script>
	<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<form action="register.php" method="post" enctype="multipart/form-data">
	
	<table>
		<tr>
			<td>User Name :</td>
			<td><input type="text" name="uname"></td>
			<td>Phone Number :</td>
			<td><input type="text" name="phnum"></td>
		</tr>
		<tr>
			<td>Enter Your Email :</td>
			<td><input type="email" name="email"></td>
			<td>Payment Method :</td>
			<td><select name="payment">
			<option value="Paypal">Paypal</option>
			<option value="Master">Master Card</option>
			<option value="Visa">Visa Card</option></select></td>
		</tr>
		<tr>
			<td>Enter Your Password :</td>
			<td><input type="password" name="password"></td>
			<td>Enter Your NIC :</td>
			<td><input type="text" name="nic"></td>
		</tr>
		<tr>
			<td>Confirm Password :</td>
			<td><input type="password"></td>
			<td>How Do You Find Us :</td>
			<td><input type="text" name="found"></td>
		</tr>
		<tr>
			<td>Address :</td>
			<td><input type="text" name="address"></td>
			<td>Favorite Fashion :</td>
			<td><input type="text" name="fav"></td>
		</tr>
		<tr>
			<td>Zip Code :</td>
			<td><input type="text" name="zip"></td>
			<td>Gender :</td>
			<td><select name="gender"><option value="male">Male</option>
			<option value="female">Female</option>
			</select></td>
		</tr>
		<tr><td>Upload Your Profile</td><td><input type="file" name="image" id="userimage"></td></tr>
	</table>
<img id="userimageview" src="#" alt="your image" style="width: 100px;height: 100px" />
	<h1>Terms and Condition</h1>
	<p>Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms 
	Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms Terms 
	Terms Terms Terms Terms Terms Terms Terms </p>
	<input type="checkbox" name="terms">I accept Terms and Conditions
	<input type="submit" name="register" value="Register">

</form>


	<script type="text/javascript">
		function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#userimageview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


	$("#userimage").change(function(){
    readURL(this);
});

	</script>
</body>
</html>