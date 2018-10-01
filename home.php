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
        <li><a href="home.php">Home</a></li>
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
         <li><a href="#">Contact Us</a></li> 
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

<div class="row">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="image/web/slide4.jpg" width="100%" style="opacity: 0.8;height: 350px">
    </div>

    <div class="item">
      <img src="image/web/slide2.jpg" width="100%" style="opacity: 0.8;height: 350px">
    </div>

    <div class="item">
      <img src="image/web/slide3.jpg" width="100%" style="opacity: 0.8;height: 350px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>

<div class="row" style="text-align: center;"><h1>Popular Item</h1></div>


<div class="row">
<?php 

$query = "SELECT * FROM item ORDER BY item_sale_count DESC LIMIT 6";
$result = get($query,$conn);

$j=0;
while($row=$result->fetch()):
$itemid[$j]=$row['item_id'];
$itemphoto[$j]=$row['item_photo'];
$itemname[$j]=$row['item_name'];
$itemprice[$j]=$row['item_price'];
$itemdiscount[$j]=$row['item_discount'];
$itemrealprice[$j]=$itemprice[$j]-(($itemprice[$j]*$row['item_discount']))/100;
$itemdescript[$j]=$row['item_description'];
$itemcount[$j]=$row['item_total'];

    ?>

  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="height: 695px; padding: 10px">
    <div id="content">
    
    <img src="image/item/<?php echo $itemphoto[$j]; ?>" style="width: 100%;height: 80%;border-bottom:5px solid red;">
    <p style="text-align: center;margin-top: 10px;font-size: 20px;color: white"><?php echo $itemname[$j]; ?></p>

    <br>

    <button class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" data-target="#itemdetail<?php echo $itemid[$j]; ?>">Detail</button>
    <span style="text-align: center;margin-top: 10px;font-size: 15px;color: white">Price:$<?php echo $itemrealprice[$j]; if($itemdiscount[$j]!=0) echo "  (Discounted!)"; ?></span>

    <?php if($login==1){ ?>
    <a class="btn btn-success" style="float: right;margin-right: 10px" onclick="<?php if($itemcount[$j]==0) echo "alert('Item Out of Stock!')"; else echo "window.location.assign('addtocart.php?id=$itemid[$j]')"; ?>">Add to Cart</a>
    <?php } ?>
    <?php if($login==1){ ?>
<div class="row"></div>
<div class="rate<?php echo $j; ?>">
    <input type="radio" id="star5<?php echo $j; ?>" name="rate<?php echo $j; ?>" value="5" />
    <label for="star5<?php echo $j; ?>">5 stars</label>
    <input type="radio" id="star4<?php echo $j; ?>" name="rate<?php echo $j; ?>" value="4" />
    <label for="star4<?php echo $j; ?>">4 stars</label>
    <input type="radio" id="star3<?php echo $j; ?>" name="rate<?php echo $j; ?>" value="3" />
    <label for="star3<?php echo $j; ?>">3 stars</label>
    <input type="radio" id="star2<?php echo $j; ?>" name="rate<?php echo $j; ?>" value="2" />
    <label for="star2<?php echo $j; ?>">2 stars</label>
    <input type="radio" id="star1<?php echo $j; ?>" name="rate<?php echo $j; ?>" value="1" />
    <label for="star1<?php echo $j; ?>">1 star</label>
  </div>  
 <?php } ?>
    <div id="itemdetail<?php echo $itemid[$j]; ?>" class="modal fade" role="dialog" style="opacity: 0.9">

  <div class="modal-dialog" style="width: 60%">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $itemname[$j]; ?></h4>
      </div>
      <div class="modal-body" style="background: black;height: 500px;">
        <img src="image/item/<?php echo $itemphoto[$j]; ?>" style="width: 50%;height: 100%;float: left;border:1px solid white;box-shadow: 0 0 10px white;">
        <div style="float: left;margin-left: 10px;">
          <table>
            <tr><td style="color:red;text-shadow: 0 0 5px red;">Name : </td><td style="color:white;text-shadow: 0 0 5px white;"><?php echo $itemname[$j]; ?></td></tr>
            <tr><td style="color:red;text-shadow: 0 0 5px red;">Item Price : </td><td style="color:white;text-shadow: 0 0 5px white;">$<?php echo $itemprice[$j]; ?></td></tr>
            <?php if($itemdiscount[$j]!=0) { ?>
            <tr><td style="color:red;text-shadow: 0 0 5px red;">Item Discount Price : </td><td style="color:white;text-shadow: 0 0 5px white;">$<?php echo $itemrealprice[$j]; ?></td></tr>
            <tr><td style="color:red;text-shadow: 0 0 5px red;">Discount Percentage : </td><td style="color:white;text-shadow: 0 0 5px white;"><?php echo $itemdiscount[$j]; ?>%</td></tr>
            <?php }?>
          </table>
          <div style="width: 400px;"><h4 style="color: white ;margin-left: 10px">Item Description</h4>
          <p style="color:white;text-shadow: 0 0 5px white;margin-left: 10px"><?php echo $itemdescript[$j]; ?></p></div>
        </div>
      </div>
      <div class="modal-footer">
      <?php if($login!=1)
      echo "<span style='margin-right:380px;'>Please Login to Add to Cart!</span>" ;?>



        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </div>
  </div>




<style type="text/css">
 *{
    margin: 0;
    padding: 0;
}
.rate<?php echo $j; ?> {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate<?php echo $j; ?>:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate<?php echo $j; ?>:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate<?php echo $j; ?>:not(:checked) > label:before {
    content: '★ ';
}
.rate<?php echo $j; ?> > input:checked ~ label {
    color: #ffc700;    
}
.rate<?php echo $j; ?>:not(:checked) > label:hover,
.rate<?php echo $j; ?>:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate<?php echo $j; ?> > input:checked + label:hover,
.rate<?php echo $j; ?> > input:checked + label:hover ~ label,
.rate<?php echo $j; ?> > input:checked ~ label:hover,
.rate<?php echo $j; ?> > input:checked ~ label:hover ~ label,
.rate<?php echo $j; ?> > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

</style>














 <?php 

 $j++;
endwhile;



?>
</div>


























<!-- Container div ends below -->
</div>

</body>
</html>