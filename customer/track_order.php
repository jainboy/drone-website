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
$order_id=get_safe_value($con,$_GET['id']);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
      <div class="container padding-bottom-3x mb-1">
        <div class="card mb-3">
          <div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Tracking Order No - </span><span class="text-medium">34VB5540K83</span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-info">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped ID:</span> <a href="#" data-toggle="tooltip" title="If you want to know current location use this track id" style="color:white">Z34449612</a></div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> UNDER PROCESSING</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected Date:</span> SEP 09, 2017</div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon">
                    <i class="pe-7s-cart"></i>
                  </div>
                </div>
                <h4 class="step-title">Confirmed Order
                <span class="tooltiptext">Date:22-11-2020</span></h4>
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-config"></i>
                  </div>
                </div>
                <h4 class="step-title">Processing Order
                <span class="tooltiptext">Date:23-11-2020</span></h4>
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-medal"></i></div>
                </div>
                <h4 class="step-title">Quality Check
                <span class="tooltiptext">Date:25-11-2020</span></h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-car"></i></div>
                </div>
                <h4 class="step-title">Product Dispatched
                <span class="tooltiptext">Date:26-11-2020</span></h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="pe-7s-home"></i></div>
                </div>
                <h4 class="step-title">Product Delivered
                <span class="tooltiptext">Date:28-11-2020</span></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center">
          <div class="custom-control custom-checkbox mr-3">
            <input class="custom-control-input" type="checkbox" id="notify_me" checked="">
            <label class="custom-control-label" for="notify_me">Notify me when order is delivered</label>
          </div>
          <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="order?id=<?php echo $order_id ?>">View Order Details</a></div>
        </div>
      </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php 
   include 'footer.php';
?>