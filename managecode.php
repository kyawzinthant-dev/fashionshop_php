<?php  
    require 'config.php';

    $conn = connect();

    //Get Database Connection
    if($conn){
        //To Validate Session 

        //To get batch list
        $query = 'Select * from giftcode';
        $result = get($query,$conn);        

        

        //To get Semester List from Semester
        // $querySemester = 'Select * from semester';
        // $semester = get($querySemester,$conn);

        

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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert" style="margin-bottom: 50px">Add Code</button>



                <table id="item">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Amount</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['code_number']."</td>
                                <td>".$row['amount']."</td>
                                <td>"."<a data-toggle='modal' data-target='#edit".$row['code_id']."' >Edit</a>/<a href='deletecode.php?id=$row[code_id]'>Delete</a>"."</td>
                               
                                </tr>";
                            ?>

                           

                    <div id="edit<?php echo $row['code_id']; ?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                             <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Manage Code</h4>
                         </div>
                         <div class="modal-body">
                                
                         <form action="updatecode.php?id=<?php echo $row['code_id']; ?>" method="post">
                         <pre>Code::  <input type="text" name="code" value="<?php echo $row['code_number']; ?>"></pre><br>
                         <pre>Amount:: <input type="text" name="amount" value="<?php echo $row['amount']; ?>"></pre><br>
  
                         <input type="submit" name="update" value="Update">
                          </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                    </div>

                        </div>
                                </div>






                            <?php endwhile; ?>
                           
                    </tbody>
                </table>

            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div id="insert" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                             <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Insert Code</h4>
                         </div>
                         <div class="modal-body">
                                
                         <form action="insertcode.php" method="post">
                         <pre>Code::  <input type="text" name="code">(XXXX-XXXX-XXXX-XXXX)</pre><br>
                         <pre>Amount:: <input type="text" name="amount"></pre><br>
  
                         <input type="submit" value="Insert">
                          </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                    </div>

                        </div>
                                </div>

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
