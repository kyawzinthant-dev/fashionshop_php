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
    padding: 10px;
  }
</style>
</head>
<body >
<div class="container">
<div class="row" style="margin-top:20px;border-bottom: 1px solid white;padding-bottom: 20px;">
<div class="col-lg-4" id="login">
<?php if($login==1){ ?>
  <p style="color:white;font-size: 20px;color: white;text-shadow: 0 0 10px black;"><?php echo $_SESSION['user']; ?><img src="image/user/<?php echo $cphoto; ?>" style="width: 70px;height: 70px;border-radius: 70px;margin-left: 10px;border:2px white solid;box-shadow: 0 0 10px white;"></p><span id="depo"><?php if($login==1) echo "$".$deposit; ?> <a style="color: #28E241;font-size: 20px;cursor: pointer">Deposit</a></span><br><br><a href="logout.php">Logout</a>
<?php } else { ?>
    <a href="login.php">Login</a> <span>or</span> <a href="#">Sign Up</a>
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


<h2 style="color: #30E527;text-shadow: 0 0 5px #30E527;display: block;text-align: center;background: black;padding: 10px;width: 70%;margin: 0 auto;border:1px solid white;border-radius: 10px;box-shadow: 0 0 10px white">Choose one of the Methods below to add Deposit.</h2>

<?php 
$m[0]="paypal";
$m[1]="master";
$m[2]="visa";


?>
<div class="row" style="margin-top: 50px">

<?php for($i=0;$i<3;$i++){ ?>
    <div class="col-lg-4">
        <a data-toggle="modal" data-target="#panel<?php echo $m[$i]; ?>" style="cursor: pointer"><img src="image/web/<?php echo $m[$i]; ?>.png" style="width: 80%"></a>
    </div>


    <div id="panel<?php echo $m[$i]; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deposit With <?php echo $m[$i]; ?></h4>
      </div>
      <div class="modal-body">
      <div style="text-align: center"><img src="image/web/<?php echo $m[$i]; ?>.png" style="width: 50%;"></div>
       <form method="post" action="insertdeposit.php?id=<?php echo $cid; ?>">
         <label>Enter Amount $</label><input type="text" name="depo" placeholder="Type amount" class="form-control" required="">
      </div>
      <div class="modal-footer">
        <input type="submit" name="" value="Deposit Now" class="btn btn-success">
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<?php }?>
</div>
<br>

<h2 style="color: #30E527;text-shadow: 0 0 5px #30E527;display: block;text-align: center;background: black;padding: 10px;width: 70%;margin: 0 auto;border:1px solid white;border-radius: 10px;box-shadow: 0 0 10px white">Get Deposit Bonus by Doing Tasks.</h2>
<br><br>
<h1><a style="color: white; text-decoration: none;cursor: pointer" onclick="alert('Done!');window.location.assign('bonus.php?per=5&id=<?php echo $cid; ?>')">1. Share Us On Facebook (5% Deposit) </a></h1>
<br><br>
<h1><a style="color: white;text-decoration: none;cursor: pointer " onclick="alert('Done!');window.location.assign('bonus.php?per=5&id=<?php echo $cid; ?>')">2. Tweet Us On Twitter (5% Deposit) </a></h1>
<br><br>
<h1><a style="color: white;text-decoration: none;cursor: pointer " onclick="alert('Done!');window.location.assign('bonus.php?per=7&id=<?php echo $cid; ?>')">3. Follow Us On Instagram (7% Deposit) </a></h1>
<br>
<br>
<br>
<h2 style="color: #30E527;text-shadow: 0 0 5px #30E527;display: block;text-align: center;background: black;padding: 10px;width: 70%;margin: 0 auto;border:1px solid white;border-radius: 10px;box-shadow: 0 0 10px white">Get Deposit Bonus by Typing Code.</h2>
<br>

<form action="code.php?id=<?php echo $cid; ?>" method="post">
    <label style="color: white;">Type Code ( Eg. XXXX-XXXX-XXXX-XXXX)</label><input type="text" name="code" class="form-control" required="" style="width: 50%">
    <br>
    <input type="submit" name="" value="Redeem" class="btn btn-success">
</form>
<!-- Container div ends below -->
</div>




</body>
</html>




