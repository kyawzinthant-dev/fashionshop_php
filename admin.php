<?php  
    require 'config.php';

    $conn = connect();

    //Get Database Connection
    if($conn){
        //To Validate Session 

        //To get batch list
        $query = 'Select * from item';
        $result = get($query,$conn);        

        

        //
        // 
        // 
        

    }
    else {
        //To redirect to the login page
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Page of Fashion Shop</title>
        <meta name="viewport" content="width=device-width, initkial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body style="background: grey">
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">

                <li class="sidebar-brand">
                    <a href="#" id="title">
                    Fashion Shop
                    </a>
                </li>

             
                <li>
                    <a href="admin.php">Dashboard</a>
                </li>
                <li>
                    <a href="manageuser.php">Manage Users</a>
                </li>
                <li>
                    <a href="itemmanage.php">Manage Item</a>
                </li>
                <li>
                    <a href="managecode.php">Manage Code</a>
                </li>
                <li>
                    <a href="orderreport.php">Order Reports</a>
                </li>

                <li>
                    <a href="logout.php">Log Out</a>
                </li>


            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>

            <div class="container">
<?php
  $query = "SELECT COUNT(item_id) FROM item";
  $result = get($query,$conn);
  while($row=$result->fetch()):
    $itemtotal=$row[0];
  endwhile;
?>
<?php
  $query = "SELECT COUNT(c_id) FROM customer";
  $result = get($query,$conn);
  while($row=$result->fetch()):
    $usertotal=$row[0];
  endwhile;
?>
<?php
  $query = "SELECT SUM(item_sale_count) FROM item";
  $result = get($query,$conn);
  while($row=$result->fetch()):
    $itemsale=$row[0];
  endwhile;
?>
                <div class="row">
                <h1 style="color: white;text-shadow: 0 0 5px white;">Dashboard</h1>
                  <div class="col-lg-4"><div style="height: 200px;background: #9B3C11;border:2px solid;border-radius: 20px;box-shadow: 0 0 10px black">
                    <p style="color: white;font-size: 30px;text-align: center;margin-top: 10px">Total Item</p> <p style="color: white;font-size: 35px;text-align: center;margin-top: 20px;text-shadow: 0 0 10px white"><?php echo $itemtotal; ?></p>
                  </div></div>
                  <div class="col-lg-4"><div style="height: 200px;background: #D30ED3;border:2px solid;border-radius: 20px;box-shadow: 0 0 10px black"><p style="color: white;font-size: 30px;text-align: center;margin-top: 10px">Total User</p> <p style="color: white;font-size: 35px;text-align: center;margin-top: 20px;text-shadow: 0 0 10px white"><?php echo $usertotal; ?></p></div></div>

                <div class="col-lg-4"><div style="height: 200px;background: green;border:2px solid;border-radius: 20px;box-shadow: 0 0 10px black"><p style="color: white;font-size: 30px;text-align: center;margin-top: 10px">Total Sale</p> <p style="color: white;font-size: 35px;text-align: center;margin-top: 20px;text-shadow: 0 0 10px white"><?php echo $itemsale; ?></p></div></div>


                </div>






            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
$(document).ready(function () {

  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });

  $('#item').DataTable();

});

</script>
</body>
</html>
