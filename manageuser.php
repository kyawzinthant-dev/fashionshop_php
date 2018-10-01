<?php  
    require 'config.php';

    $conn = connect();

    //Get Database Connection
    if($conn){
        //To Validate Session 

        //To get batch list
        $query = 'Select * from customer';
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
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


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

          
                <table id="user">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['c_name']."</td>
                                <td>"." <a type='button' class='btn btn-info btn-lg' href='showuser.php?id=$row[c_id]''>Detail</a>"."</td>
                                <td><a href='deleteuser.php?id=$row[c_id]'>Delete</a> </td>
                                </tr>";
                            ?>
                            <?php endwhile; ?>
                           
                    </tbody>
                </table>
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

  $('#user').DataTable();

});

</script>
</body>
</html>
