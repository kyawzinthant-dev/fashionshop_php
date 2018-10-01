<?php
 require 'config.php';

 $conn = connect();

 $error=0;

 session_start();
 if(isset($_SESSION['user']))
 	header("location:index.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/styleweb.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
  table tr td
  {
    padding: 10px;
  }
</style>
<script type="text/javascript">
		
		<?php $error=$_GET['error']; ?>
		var error=1;
		if(error==<?php echo $error; ?>)
		{
			alert("Accept Terms and Conditions!");
		}

	</script>
</head>
<body>
<div class="container">
<div class="row" style="margin-top:20px;border-bottom: 1px solid white;padding-bottom: 20px;">
<div class="col-lg-4" id="login">
  <a href="login.php">Login</a> <span>or</span> <a href="#">Sign Up</a>
</div>
	<div id="logo" class="col-lg-4"><img src="image/web/logo.png" width="130%"></div>
	<div class="col-lg-4" id="cash">
		<div id="cart">
		<span id="depo"></span>
		<img src="image/web/cart.png" width="20%"></div>
	</div>
</div>
<div class="row">
	
<nav class="navbar" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <img src="image/web/bar.png" style="width: 10%;float: right;">
      </button>
      <a class="navbar-brand" href="#" style="color: white; ">+959965286184</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" >
        <li><a href="index.php">Home</a></li>
        <li>

        <a class="dropdown-toggle" data-toggle="dropdown">Man
  <span class="caret"></span></button>
 <ul class="dropdown-menu">
    <li><a href="content.php?category=man&type=shirt">Shirts</a></li>
    <li><a href="content.php?category=man&type=trouser">Trousers</a></li>
    <li><a href="content.php?category=man&type=shoe">Shoes</a></li>
    <li><a href="content.php?category=man&type=accessory">Accessories</a></li>
  </ul></li>


        <li><a class="dropdown-toggle" data-toggle="dropdown">Woman
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="content.php?category=woman&type=shirt">Shirts</a></li>
    <li><a href="content.php?category=woman&type=trouser">Trousers</a></li>
    <li><a href="content.php?category=woman&type=shoe">Shoes</a></li>
    <li><a href="content.php?category=woman&type=accessory">Accessories</a></li>
  </ul></li> 
        <li><a class="dropdown-toggle" data-toggle="dropdown">Kid
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="content.php?category=kid&type=shirt">Shirts</a></li>
    <li><a href="content.php?category=kid&type=trouser">Trousers</a></li>
    <li><a href="content.php?category=kid&type=shoe">Shoes</a></li>
    <li><a href="content.php?category=kid&type=accessory">Accessories</a></li>
  </ul></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <div class="form-group" style="width: 100%">
        <form onsubmit="handle" action="search.php" method="get">
        <input type="text" class="form-control" placeholder="Search" style="margin-top: 10px;" name="search">
        </form>
        <script>
    function handle(e){
        e.preventDefault(); // Otherwise the form will be submitted

        alert("FORM WAS SUBMITTED");
    }
</script>
      </div>
       
      </ul>
    </div>
  </div>
</nav>

</div>



<form action="register.php" method="post" enctype="multipart/form-data">
	
	<table id="register">
	<tr><td>Upload Your Profile</td><td><input type="file" name="image" id="userimage"></td>
		<td><div style="border:3px solid white; width: 200px;height: 200px;margin: 0 auto"><img id="userimageview" src="#" alt="Upload Image" style="width: 100%;height: 100%;" ><div></td>
		</tr>
		<tr>
			<td>User Name :</td>
			<td><input type="text" name="uname" class="form-control" required></td>
			<td>Phone Number :</td>
			<td><input type="text" name="phnum" class="form-control" required="" pattern='^[0-9]*$'></td>
		</tr>
		<tr>
			<td>Enter Your Email :</td>
			<td><input type="email" name="email" class="form-control" pattern='^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$' required=""></td>
			<td>Payment Method :</trd>
			<td><select name="payment" class="form-control">
			<option value="Paypal">Paypal</option>
			<option value="Master">Master Card</option>
			<option value="Visa">Visa Card</option></select></td>
		</tr>
		<tr>
			<td>Enter Your Password :</td>
			<td><input type="password" name="password" class="form-control" id="password" required=""></td>
			<td>Enter Your NIC :</td>
			<td><input type="text" name="nic" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Confirm Password :</td>
			<td><input type="password" class="form-control" id="confirm_password" required=""></td>
			<td>How Do You Find Us :</td>
			<td><input type="text" name="found" class="form-control" required=""></td>
		</tr>
		<script type="text/javascript">
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
		<tr>
			<td>Address :</td>
			<td><input type="text" name="address" class="form-control" required=""></td>
			<td>Favorite Fashion :</td>
			<td><input type="text" name="fav" class="form-control" required=""></td>
		</tr>
		<tr>
			<td>Zip Code :</td>
			<td><input type="text" name="zip" class="form-control" required="" pattern='^[0-9]*$'></td>
			<td>Gender :</td>
			<td><select name="gender" class="form-control"><option value="male" class="form-control">Male</option>
			<option value="female" class="form-control">Female</option>
			</select></td>
		</tr>

	</table>

<br>
	<h1>Terms and Condition</h1>
	<p style="color:white;font-size: 20px;background: black;padding:10px;text-shadow: 0 0 5px white;border :1px solid white;box-shadow: 0 0 10px white;margin-top: 10px">The Liscense under the fashion shop company is possessed by the private company in Myanmar. There is no refund for the deposit and purchasing.</p>
	<input type="checkbox" name="terms"><span style="color:white;font-size: 20px;">I accept Terms and Conditions</span>
	<input type="submit" name="register" value="Register" class="btn btn-primary">

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




























</div>
</div>
<!-- Container div ends below -->
</div>

</body>
</html>