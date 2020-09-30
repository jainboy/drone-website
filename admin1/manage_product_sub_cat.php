<?php
ob_start();
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';
   $main_cat='';
   $sub_name='';
   $sub_desc='';
   $sub_meta='';  
   $msg='';
   if(isset($_GET['id']) && $_GET['id']!=''){
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"select * from `sub-category` where id='$id'");
      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $main_cat=$row['main_category'];
         $sub_name=$row['sub_cat_name'];
         $sub_desc=$row['sub_description'];
         $sub_meta=$row['sub_meta_desc'];   
      }
      else{
        header('location:ship_sub_category');
         die();
      }
   }
   if(isset($_POST['submit'])){
      $main_cat=get_safe_value($con,$_POST['main_cat']);
      $sub_name=get_safe_value($con,$_POST['sub_name']);
      $sub_desc=get_safe_value($con,$_POST['sub_desc']);
      $sub_meta=get_safe_value($con,$_POST['sub_meta']);
   	$res=mysqli_query($con,"select * from `sub-category` where sub_cat_name='$main_cat'");
   	$check=mysqli_num_rows($res);
   	if($check>0){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			$getData=mysqli_fetch_assoc($res);
   			if($id==$getData['id']){
            
   			}else{
   				$msg="sub-Categories already exist";
   			}
   		}else{
   			$msg="sub-Categories already exist";
   		}
   	} 
   	if($msg==''){
   		if(isset($_GET['id']) && $_GET['id']!=''){
   			mysqli_query($con,"UPDATE `sub-category` SET `main_category`='$main_cat',`sub_cat_name`='$sub_name',`sub_description`='$sub_desc',`sub_meta_desc`='$sub_meta' WHERE `id`='$id'");
   		}else{
   			mysqli_query($con,"INSERT INTO `sub-category`(`main_category`, `sub_cat_name`, `sub_description`,`sub_meta_desc`,`status`) VALUES ('$main_cat','$sub_name','$sub_desc','$sub_meta','1')");
         }
         header('location:ship_sub_category');
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
            <button class="btn btn-info">  <a href="ship_sub_category" class="alink"> Back</a></button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Sub Category</li>
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
                  <label for="exampleFormControlSelect1">Main Category</label>
                  <select class="form-control" name="main_cat">
                        <option>Select Category</option>
                        <?php
                           $res=mysqli_query($con,"select id,cat_name from `product_categories` order by cat_name asc");
                           while($row=mysqli_fetch_assoc($res)){
                              if($row['cat_name']==$main_cat){
                                 echo "<option selected value=".$row['cat_name'].">".$row['cat_name']."</option>";
                              }else{
                                 echo "<option value=".$row['cat_name'].">".$row['cat_name']."</option>";
                              }
                              
                           }
                        ?>                            
                  </select>
               </div>
                <div class="form-group">
                  <label><strong>Sub-Category Name</strong></label>
                  <input type="text" name="sub_name" placeholder="Enter your Categories name" value="<?php echo $sub_name?>" class="form-control">
                </div>
                <div class="form-group">
                  <label><strong>Description</strong></label>
                  <textarea class="form-control"  name="sub_desc" rows="4"><?php echo $sub_desc?></textarea>
                </div>
                <div class="form-group">
                  <label>Meta description<strong style="color:grey; font-size:14px;">(optional)</strong></label>
                  <textarea class="form-control"  name="sub_meta" rows="4"><?php echo $sub_meta?></textarea>
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
<?php     include 'footer.php';?>