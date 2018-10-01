<?php
require 'config.php';

    $conn = connect();

    session_start();
    if(isset($_SESSION['user']))
    {
    $login=1;
    $username=$_SESSION['user'];
    $query = "select * from customer where c_name='$username'";
    $result = get($query,$conn);
    while($row=$result->fetch()):
    $cid=$row['c_id'];
    $cphoto=$row['c_photo'];
    endwhile;

    $query = "select * from deposit where c_id='$cid'";
    $result = get($query,$conn);
    while($row=$result->fetch()):
    $deposit=$row['total_deposit'];
    endwhile;
  }
  else
  {
    $login=0;
    unset($username);
  }
 
if(isset($_GET['wrong']))
{
	if($_GET['wrong']==1)
	{
		echo "<script>alert('Username or Password is wrong!')</script>";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="css/styleweb.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style type="text/css">
  table tr td
  {
    padding: 20px;
    box-shadow: 0 0 10px white;
  }
</style>

</head>
<body>
<div class="container">
<div class="row" style="margin-top:20px;border-bottom: 1px solid white;padding-bottom: 20px;">
<div class="col-lg-4" id="login">
<?php if($login==1){ ?>
  <p style="color:white;font-size: 20px;color: white;text-shadow: 0 0 10px black;"><?php echo $_SESSION['user']; ?><img src="image/user/<?php echo $cphoto; ?>" style="width: 70px;height: 70px;border-radius: 70px;margin-left: 10px;border:2px white solid;box-shadow: 0 0 10px white;"></p><span id="depo"><?php if($login==1) echo "$".$deposit; ?> <a style="color: #28E241;font-size: 20px;cursor: pointer" href="deposit.php">Deposit</a></span><br><br><a href="logout.php">Logout</a>
<?php } else { ?>
	<a href="login.php">Login</a> <span>or</span> <a href="signup.php">Sign Up</a>
<?php }?>
</div>
	<div id="logo" class="col-lg-4"><img src="image/web/logo.png" width="130%" style="margin-left: -50px"></div>
	<div class="col-lg-4" id="cash">
	
    <div id="imgcart">
		<a href="addtocart.php"><img src="image/web/cart.png" width="20%"></a>  
    <span id="cartitem"><span style="text-shadow: 0 0 10px #28E241;"><?php if(isset($_SESSION['count'])) echo $_SESSION['count']; else echo "0"; ?></span> in the cart.</span>
    </div>

	</div>
</div>
<div class="row">
	
<nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
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



<div style="text-align: center;">

<form name="login" action="validate.php" method="post">
<table style="background: white;margin: 0 auto">
	<tr><td><label>Username:</label><input type="text" name="uname" class="form-control"></td></tr>
	<tr><td><label>Password:</label><input type="password" name="upassword" class="form-control" required=""><br></td></tr>
	
	</table>
	<input type="submit" value="Login" style="margin-top: 20px" class="btn btn-success" required="">
</form>
</div>



</div>



<!-- Container div ends below -->
</div>
</body>
</html>