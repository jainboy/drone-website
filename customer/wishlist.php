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
$uid=$_SESSION['USER_ID'];
if(isset($_GET['wishlist_id'])){
  $wid=$_GET['wishlist_id'];
  mysqli_query($con,"DELETE FROM `wishlist` WHERE `id`='$wid' AND `user_id`='$uid'");
}
$res=mysqli_query($con,"SELECT `product`.`pro_name`,`product`.`pro_image`,`product`.`pro_sell_price`,`product`.`pro_mrp`,`wishlist`.`id` FROM `product`,`wishlist` WHERE `wishlist`.`product_id`=`product`.`id` AND `wishlist`.`user_id`='$uid'");
?>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="text-info">Wishlist</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Wishlist</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header border-transparent">
            <h1>My Wishlist</h1>
              <p class="lead">You can orders These wishlist products.</p>
              <p class="text-muted">If you have any questions, please feel free to <a href="contact_us.php">contact us</a>, our customer service center is working for you 24/7.</p>
              <hr>
          </div>      <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Unit Price</th>
                    <th>Selling Price</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while($row=mysqli_fetch_assoc($res)){
                  ?>
                  <tr>
                        <td width="150px"><a href="#"><img src="./admin/product_images/<?php echo $row['pro_image']?>" alt="<?php echo $row['pro_meta_keyword']?>" style="width:50%;"></a></td>
                        <td><a href="#"><?php echo $row['pro_name']?></a></td>
                        <td><?php echo $row['pro_mrp']?></td>
                        <td><?php echo $row['pro_sell_price']?></td>
                        <td><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                      <?php  } ?>
                </tbody>
              </table>
            </div>        <!-- /.table-responsive -->
          </div>   
        </div>
        <div class="box-footer d-flex justify-content-between flex-column flex-lg-row __web-inspector-hide-shortcut__">
                    <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                    <div class="right">
                      <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                    </div>
                  </div>
              </div>     
    </div>    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
  <!-- /.content-wrapper -->
<?php 
   include 'footer.php';
?>