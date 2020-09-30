<?php
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';

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
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-info">ALL ORDER</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_dashboard">Home</a></li>
              <li class="breadcrumb-item active">All Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- Left col -->
          <div class="col-md-12">
          <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Orders</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
              <thead>
                      <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Pdf</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $user_id=$_SESSION['USER_ID'];
                      $res=mysqli_query($con,"SELECT  * FROM `customer_order` where `user_id`='$user_id'");             
                      while($row=@mysqli_fetch_assoc($res)){
                        $order_id=$row['order_id'];
                        $order_date=$row['added_on'];
                        $order_total=$row['order_total'];
                        $order_status=$row['order_status']; ?>
                      <tr>
                        <th>#<?php echo $order_id ?></th>
                        <td><?php echo date_format(new DateTime($order_date),'d-m-Y');?></td>
                        <td><?php echo $order_total ?></td> 
                        <?php
												if($order_status=='pending'){
													echo " <td><span class='badge badge-info'>In Process</span></td>";
												}else if($order_status=='received' || $order_status=='complete'){
													echo " <td><span class='badge badge-success'>Received</span></td>";
												}else if($order_status=='cancelled'){
													echo " <td><span class='badge badge-danger'>Cancelled</span></td>";
												}else{
													echo "<td><span class='badge badge-warning'>Return</span></td>";
												} ?> 
                        <td><a href="order?id=<?php echo $order_id ?>" class="btn btn-primary btn-sm">View</a></td>
                        <td>
                        <?php if($order_status=='received' || $order_status=='complete'){ ?>
                          <a href="invoice-print?id=<?php echo $order_id ?>" class="btn btn-success btn-sm" target="_blank">Invoice</a></td>
                        <?php } else{?>
                          <a href="track_order?id=<?php echo $order_id ?>" class="btn btn-danger btn-sm">Track</a></td>
                       <?php } ?>
                      </tr>
                    <?php } ?>
                    </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
        </div>        
          </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
   include 'footer.php';
?>