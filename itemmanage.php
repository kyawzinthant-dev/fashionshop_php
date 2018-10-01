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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert" style="margin-bottom: 50px">Add Item</button>




<div id="insert" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Insert An Item</h4>
      </div>
      <div class="modal-body">
      <form action="insertitem.php" method="post" enctype="multipart/form-data">
      <div>
      <div style="width: 230px; height: 302px;margin: 0 auto;border: 1px solid ">
      <img id="itemview" src="#" alt="Upload Image" style="width: 100%;height: 100%;margin: 0 auto" />
      </div>

      <input type="file" name="image" id="itemimage" style="margin-top: 20px;margin-bottom: 20px;">
      </div>
      <script type="text/javascript">
        function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#itemview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


    $("#itemimage").change(function(){
    readURL(this);
});ice

    </script>

<table>

       
            <tr><td style="padding: 10px;">Item Name :</td><td style="padding: 10px;"><input type="text" name="iname"></td></tr>
            <tr><td style="padding: 10px;">Item Price in $ :</td><td style="padding: 10px;"><input type="text" name="iprice"></td></tr>
            <tr><td style="padding: 10px;">Item Discount % :</td><td style="padding: 10px;"><input type="text" name="idiscount"></td></tr>
            <tr><td style="padding: 10px;">Item Type :</td><td style="padding: 10px;"><select name="itype"><option value="shirt">Shirt</option><option value="trouser">Trouser</option><option value="shoe">Shoe</option><option value="accessory">Accessory</option></select></td></tr>
            <tr><td style="padding: 10px;">Item Category :</td><td style="padding: 10px;"><select name="icate"><option value="man">Man</option><option value="woman">Woman</option><option value="kid">Kid</option></select></td></tr>
            <tr><td style="padding: 10px;">Item Description :</td><td style="padding: 10px;"><textarea name="idescript"></textarea></td></tr>
            <tr><td style="padding: 10px;">Item Tag Name :</td><td style="padding: 10px;"><input type="text" name="itname"></td></tr>
            <tr><td style="padding: 10px;">Item Count :</td><td style="padding: 10px;"><input type="text" name="icount"></td></tr>
            <tr><td><input type="submit" name="insertitem" value="Insert Item"></td></tr>
        </table>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>








                <table id="item">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Item Type</th>
                            <th>Item Category</th>
                            <th>Item Price</th>
                            <th>Item In Inventory</th>
                            <th>Item Sold</th>
                            <th>Item Detail</th>
                            <th>Edit Item</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row = $result->fetch()): ?>
        
                            <?= "<tr>
                                <td>".$row['item_name']."</td>
                                <td>".$row['item_type']."</td>
                                <td>".$row['item_category']."</td>
                                <td>$".$row['item_price']."</td>
                                <td>".$row['item_total']."</td>
                                <td>".$row['item_sale_count']."</td>
                                <td>"."<a data-toggle='modal' data-target='#detail".$row['item_id']."' >Detail</a>"."</td>
                                <td>"."<a data-toggle='modal' data-target='#edit".$row['item_id']."' >Edit</a>/<a href='deleteitem.php?id=$row[item_id]'>Delete</a>"."</td>
                               
                                </tr>";
                            ?>

                            <div id="detail<?php echo $row['item_id']; ?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                             <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Item Detail</h4>
                         </div>
                         <div class="modal-body">
                          
                             <div style="width: 230px; height: 302px;margin: 0 auto;border: 1px solid ">
                            <img id="itemdetailimage" src="image/item/<?php echo $row["item_photo"]; ?>" alt="Item Image" style="width: 100%;height: 100%;margin: 0 auto" />
                             </div>
                             <div class="row" style="margin-top: 20px;margin-left: 72px;">
                            <div class="col-lg-6"><p>Item Name:</p>
                            <p>Item Price:</p>
                            <p>Item Discount:</p>
                             <p>Item Rating:</p>
                             <p>Item Tag:</p>
                             <p>Item Total:</p></div> <div class="col-lg-6"><p><?php echo $row["item_name"]; ?></p>
                            <p>$<?php echo $row["item_price"]; ?></p>
                            <p><?php echo $row["item_discount"]; ?>%</p> 
                             <p><?php echo $row["item_rating"]; ?></p> 
                              <p><?php echo $row["item_tag"]; ?></p>
                               <p><?php echo $row["item_total"]; ?></p></div>
                            </div>


                          </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                    </div>

                        </div>
                                </div>




                    <div id="edit<?php echo $row['item_id']; ?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                             <!-- Modal content-->
                         <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Update Item</h4>
                         </div>
                         <div class="modal-body">
                                
                         <form action="updateitem.php?id=<?php echo $row['item_id']; ?>" method="post">
                         <pre>Item Name::  <input type="text" name="iname" value="<?php echo $row['item_name']; ?>"></pre><br>
                         <pre>Item Price:: <input type="text" name="iprice" value="<?php echo $row['item_price']; ?>"></pre><br>
                          <pre>Item Type::  <select name="itype">
                          <option value="shirt" <?php if($row['item_type']=="shirt") echo "selected" ?>>Shirt</option>
                          <option value="trouser" <?php if($row['item_type']=="trouser") echo "selected" ?>>Trouser</option>
                          <option value="shoe" <?php if($row['item_type']=="shoe") echo "selected" ?>>Shoe</option>
                          <option value="accessory" <?php if($row['item_type']=="accessory") echo "selected" ?>>Accessory</option></select></pre><br>

                          <pre>Item Category::  <select name="icate">
                          <option value="man" <?php if($row['item_category']=="man") echo "selected" ?>>Man</option>
                          <option value="woman" <?php if($row['item_category']=="woman") echo "selected" ?>>Woman</option>
                          <option value="kid" <?php if($row['item_category']=="kid") echo "selected" ?>>Kid</option>
                          </select></pre><br>
                         <pre>Item Discount %:: <input type="text" name="idiscount" value="<?php echo $row['item_discount']; ?>"></pre><br>
                         <pre>Item Inventory:: <input type="text" name="icount" value="<?php echo $row['item_total']; ?>"></pre><br>
                         <pre>Item Tag:: <input type="text" name="itname" value="<?php echo $row['item_tag']; ?>"></pre><br>
                         <pre>Item Description:: <textarea name="idescript"><?php echo $row['item_description']; ?></textarea></pre><br>
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
