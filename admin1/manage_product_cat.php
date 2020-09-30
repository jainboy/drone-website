<?php
ob_start();
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';
   $categories='';
   $description='';
   $meta_desc='';
   $msg='';
   if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from product_categories where id='$id'");
      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $categories=$row['cat_name'];
         $description=$row['cat_description'];
         $meta_desc=$row['meta_description'];   
      }
      else{
        // header('location:ship_category');
         die();
      }
   }
   if(isset($_POST['submit'])){
      $categories=get_safe_value($con,$_POST['cat_name']);
      $description=get_safe_value($con,$_POST['cat_desc']);
      $meta_desc=get_safe_value($con,$_POST['cat_meta']);
   	$res=mysqli_query($con,"select * from product_categories where cat_name='$categories'");
   	$check=mysqli_num_rows($res);
   	if($check>0){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			$getData=mysqli_fetch_assoc($res);
   			if($id==$getData['id']){
            
   			}else{
   				$msg="Categories already exist";
   			}
   		}else{
   			$msg="Categories already exist";
   		}
   	} 
   	if($msg==''){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			mysqli_query($con,"UPDATE `product_categories` SET `cat_name`='$categories',`cat_description`='$description',`meta_description`='$meta_desc' WHERE `id`='$id'");
   		}else{
   			mysqli_query($con,"INSERT INTO `Product_categories`(`cat_name`, `cat_description`, `meta_description`,`status`) VALUES ('$categories','$description','$meta_desc','1')");
         }
         header('location:ship_category');
   		die();
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
            <button class="btn btn-info">  <a href="ship_category" class="alink"> Back</a></button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <!-- Input addon -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product Category Insert</h3>
              </div>
              <div class="card-body text-info">
              <form method="post">
                <div class="form-group">
                  <label><strong>Category Name</strong></label>
                  <input class="form-control" type="text" value="<?php echo $categories?>" name="cat_name">
                </div>
                <div class="form-group">
                  <label><strong>Description</strong></label>
                  <textarea class="form-control" name="cat_desc" rows="10"><?php echo $description?></textarea>
                </div>
                <div class="form-group">
                  <label>Meta description<strong style="color:grey; font-size:14px;">(optional)</strong></label>
                  <textarea class="form-control"  name="cat_meta" rows="4"><?php echo $meta_desc?></textarea>
                <div><br/>
                <div class="form-group"><button class="btn btn-info btn-sm" type="submit" name="submit">Save&nbsp;</button></div>
                <div class="field_error"><?php echo $msg?></div>
            </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Horizontal Form -->
          </div>
          <!--/.col (left) -->
      
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
