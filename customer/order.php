<?php 
 include "./link.php";
 include "./topbar.php";
 include "./sidebar.php";
 include "./functions.php";
 include '../admin1/db/db.php';
  //  error_reporting (E_ALL ^ E_NOTICE); 
      if(!isset($_SESSION['USER_LOGIN'])){
        ?>
        <script>
          window.location.href='ragistration.php';
        </script>
      <?php
      }
      $image='';
if(isset($_SESSION['USER_LOGIN'])){
$image_required='';
$user_id=$_SESSION['USER_ID'];
$res=mysqli_query($con,"SELECT * FROM `users` where id='$user_id'");
$check=mysqli_num_rows($res);
if($check>0){
$row=mysqli_fetch_assoc($res);
$image=$row['image'];
}
}
      $order_id=get_safe_value($con,$_GET['id']);
      $order_date='';
      $order_status='';
      $res=mysqli_query($con,"SELECT  * FROM `customer_order` where `order_id`='$order_id'");
      $check=mysqli_num_rows($res);
      if($check>0){
        $row=mysqli_fetch_assoc($res);
        $order_date=$row['added_on'];
        $order_status=$row['order_status'];
      }
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: <?php echo date_format(new DateTime($order_date),'d-m-Y'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <strong> Invoice address</strong>
                  <address>
                    Admin, Inc.<br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong> Shipping address </strong>
                  <address>
                  <?php $res=mysqli_query($con,"SELECT  * FROM `customer_order` where `order_id`='$order_id'");
                            $check=mysqli_num_rows($res);
                            if($check>0){
                              $row=mysqli_fetch_assoc($res);
                              $firstname=$row['firstname'];
                              $lastname=$row['lastname'];
                              $street=$row['street'];
                              $city=$row['city'];
                              $dist=$row['dist'];
                              $zip=$row['zip'];
                              $state=$row['state'];
                              $phone=$row['mobile'];
                              $email=$row['email'];
                      }?>
                    <?php echo $firstname.' '.$lastname?><br>
                    <?php echo $street?><br>
                    <?php echo $city?>
                    <?php echo '&nbsp;('.$dist.')'?><br>
                    <?php echo $zip.'&nbsp;'.$state?><br>
                    Phone: <?php echo $phone?><br>
                    Email: <?php echo $email?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?php echo $order_id ?></b><br>
                  <b>Order ID:</b> <?php echo $order_id ?><br>
                  <b>Payment Due:</b> <?php echo date_format(new DateTime($order_date),'d-m-Y'); ?><br>
                  <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product Image</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Unit price</th>
                      <th>Shipping</th>
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
											$uid=$_SESSION['USER_ID'];
											$res1=mysqli_query($con,"SELECT DISTINCT(`order_details`.`id`) ,`order_details`.*,`product`.`pro_name`,`product`.`pro_image`,`product`.`pro_sell_price`,`product`.`pro_shipping`,`product`.`id` FROM `order_details`,`product`,`customer_order` WHERE `order_details`.`order_id`='$order_id' AND `customer_order`.`user_id`='$uid' AND `order_details`.`product_id`=`product`.`id`");
                      $total_price=0;
                      $shipping_charges=0;
                      $cart_total=0;
											while($row1=mysqli_fetch_assoc($res1)){
                      $total_price=$total_price+($row1['quantity']*$row1['price']);
                      $shipping_value=$row1['quantity']*$row1['pro_shipping'];
                      $sub_total=($row1['quantity']*$row1['price'])+$shipping_value;                                       
                      $shipping_charges=$shipping_charges+($row1['quantity']*$row1['pro_shipping']);
                      $cart_total=$cart_total+$sub_total;
                      $total_price=$cart_total-$shipping_charges;
											?>
                      <tr>
                        <td><img src="../admin1/dist/img/product/<?php echo $row1['pro_image']?>" style="width:50px; height:50px;"></td>
                        <td><?php echo $row1['pro_name']?></td>
                        <td><?php echo $row1['quantity']?></td>
                        <td><?php echo $row1['pro_sell_price']?></td>
                        <td><?php echo $row1['quantity'].'*'.$row1['pro_shipping'].'='.$shipping_value?></td>
                        <td>₹ <?php echo $sub_total?></td>
                      </tr>
                     <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead text-bold">INSTRUCTIONS:</p>
                  <p class="text-info well well-sm shadow-none" style="margin-top: 10px;">
                  1. Billing address and shipping adress will be same.<br/>
                  2. Use active Mobile No <br/>
                  3. In case return Prodct use invoice address. <br/>
                  4. Product only return when it is demaged or another product you received.<br/>
                  5. For other instruction goto instrution page.
                   
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo date_format(new DateTime($order_date),'d-m-Y'); ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>₹ <?php echo $total_price ?></td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>₹ 10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>₹ <?php echo $shipping_charges ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>₹ <?php echo $cart_total?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print?id=<?php echo $order_id ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php  include "./footer.php"; ?>        