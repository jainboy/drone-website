<?php
ob_start();
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';
   $categories_id='';
   $sub_categories_id='';
   $name='';
   $mrp='';
   $price='';
   $qty='';
   $productimage='';
   $productimage1='';
   $productimage2='';
   $productimage3='';
   $short_desc='';
   $description='';
   $availability='';
   $shipping_charges='';
   $meta_title='';
   $meta_desc='';
   $meta_keyword='';
   $msg='';
   $image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		  $categories_id=$row['pro_cat'];
        $sub_categories_id=$row['pro_sub_cat'];
        $name=$row['pro_name'];
        $mrp=$row['pro_mrp'];
        $price=$row['pro_sell_price'];
        $qty=$row['pro_qty'];
        $productimage=$row['pro_image'];
        $productimage1=$row['pro_img1'];
        $productimage2=$row['pro_img2'];
        $productimage3=$row['pro_img3'];
        $short_desc=$row['pro_short'];
        $description=$row['pro_des'];
        $availability=$row['pro_status'];
        $shipping_charges=$row['pro_shipping'];
        $meta_title=$row['pro_meta_title'];
        $meta_desc=$row['pro_meta_desc'];
        $meta_keyword=$row['pro_meta_keyword'];

	}else{
		header('location:all_product.php');
		die();
	}
}

if(isset($_POST['submit'])){

	$categories_id=get_safe_value($con,$_POST['categories']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories']);
	$name=get_safe_value($con,$_POST['pro_name']);
	$mrp=get_safe_value($con,$_POST['pro_mrp']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['pro_qty']);
	$short_desc=get_safe_value($con,$_POST['pro_short_desc']);
	$description=get_safe_value($con,$_POST['content_box']);
	$availability=get_safe_value($con,$_POST['pro_avail']);
	$shipping_charges=get_safe_value($con,$_POST['pro_shipping']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
   $productimage=$_FILES["pro_image"]["name"];
   $productimage1=$_FILES["pro_image1"]["name"];
   $productimage2=$_FILES["pro_image2"]["name"];
   $productimage3=$_FILES["pro_image3"]["name"];

	$res=mysqli_query($con,"select * from product where pro_name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	

if($msg==''){
   if(isset($_GET['id']) && $_GET['id']!=''){
      if($_FILES['pro_image']['name']!='' || $_FILES['pro_image1']['name']!='' || $_FILES['pro_image2']['name']!='' || $_FILES['pro_image3']['name']!='' ){
         move_uploaded_file($_FILES["pro_image"]["tmp_name"],"dist/img/product/".$_FILES["pro_image"]["name"]);
         move_uploaded_file($_FILES["pro_image1"]["tmp_name"],"dist/img/product/".$_FILES["pro_image1"]["name"]);
         move_uploaded_file($_FILES["pro_image2"]["tmp_name"],"dist/img/product/".$_FILES["pro_image2"]["name"]);
         move_uploaded_file($_FILES["pro_image3"]["tmp_name"],"dist/img/product/".$_FILES["pro_image3"]["name"]);
      mysqli_query($con,"UPDATE `product` SET `pro_cat`='$categories_id',`pro_sub_cat`='$sub_categories_id',`pro_name`='$name',`pro_mrp`='$mrp',`pro_sell_price`='$price',`pro_qty`='$qty',`pro_image`='$productimage',`pro_img1`='$productimage1',`pro_img2`='$productimage2',`pro_img3`='$productimage3',`pro_short`='$short_desc',`pro_des`='$description',`pro_status`='$availability',`pro_shipping`='$shipping_charges',`pro_meta_title`='$meta_title',`pro_meta_desc`='$meta_desc',`pro_meta_keyword`='$meta_keyword' WHERE `id`='$id'");
   }
   else{
      mysqli_query($con,"UPDATE `product` SET `pro_cat`='$categories_id',`pro_sub_cat`='$sub_categories_id',`pro_name`='$name',`pro_mrp`='$mrp',`pro_sell_price`='$price',`pro_qty`='$qty',`pro_short`='$short_desc',`pro_des`='$description',`pro_status`='$availability',`pro_shipping`='$shipping_charges',`pro_meta_title`='$meta_title',`pro_meta_desc`='$meta_desc',`pro_meta_keyword`='$meta_keyword' WHERE `id`='$id'");
   }
}else{
   move_uploaded_file($_FILES["pro_image"]["tmp_name"],"dist/img/product/".$_FILES["pro_image"]["name"]);
   move_uploaded_file($_FILES["pro_image1"]["tmp_name"],"dist/img/product/".$_FILES["pro_image1"]["name"]);
   move_uploaded_file($_FILES["pro_image2"]["tmp_name"],"dist/img/product/".$_FILES["pro_image2"]["name"]);
   move_uploaded_file($_FILES["pro_image3"]["tmp_name"],"dist/img/product/".$_FILES["pro_image3"]["name"]);
   $sql=mysqli_query($con,"INSERT INTO `product`(`pro_cat`, `pro_sub_cat`, `pro_name`, `pro_mrp`, `pro_sell_price`, `pro_qty`, `pro_image`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_short`, `pro_des`, `pro_status`, `pro_shipping`, `pro_meta_title`, `pro_meta_desc`, `pro_meta_keyword`,`status`) VALUES ('$categories_id','$sub_categories_id','$name','$mrp','$price','$qty','$productimage','$productimage1','$productimage2','$productimage3','$short_desc','$description','$availability','$shipping_charges','$meta_title','$meta_desc','$meta_keyword','1')");
   $msg="Product Inserted Successfully !!";
}
   header('location:all_product.php');
   die();
}
}

?>
 
<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat",
	data:'cat_name1='+val,
	success: function(data){
		$("#sub_categories").html(data);
	}
	});
}
</script>	 
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button class="btn btn-info">  <a href="all_product" class="alink"> Back</a></button>
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
              <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                           <div class="form-group">
                              <label  class=" form-control-label">Categories</label>
                                 <select class="form-control" name="categories" onChange="getSubcat(this.value);" >
                                    <option>Select Category</option>
                                       <?php
                                          include('../dbconnection/db.php');
                                          $query=mysqli_query($con,"SELECT * FROM `product_categories`");
                                          while($row=mysqli_fetch_array($query)){
                                       ?>                               
                                          <option value="<?php echo $row['cat_name']; ?>">
                                       <?php
                                          echo $row['cat_name'];
                                       ?>
                                          </option> 
                                       <?php    } ?>
									      </select>
								   </div>
								   <div class="form-group">
									   <label  class=" form-control-label">Sub-categories</label>
                              <select class="form-control" name="sub_categories" id="sub_categories"> 
                              </select>
								   </div>
								   <div class="form-group">
                              <label class=" form-control-label">Product Name</label>
                              <input type="text" name="pro_name" value="<?php echo $name; ?>" placeholder="Enter product name" class="form-control" required>
								   </div>								
                           <div class="form-group">
                              <label class=" form-control-label">MRP</label>
                              <input type="text" name="pro_mrp" value="<?php echo $mrp; ?>" placeholder="Enter product mrp" class="form-control" required>
                           </div>							
                           <div class="form-group">
                              <label  class=" form-control-label">Price</label>
                              <input type="text" name="price" value="<?php echo $price; ?>" placeholder="Enter product price" class="form-control" required>
                           </div>							
                           <div class="form-group">
                              <label class=" form-control-label">Qty</label>
                              <input type="text" name="pro_qty" value="<?php echo $qty; ?>" placeholder="Enter qty" class="form-control" required>
                           </div>			
                           <div class="form-row">
                              <div class="col-md-3 mb-3">
                                 <label class=" form-control-label">Main-image</label>
                                 <input type="file" name="pro_image" class="form-control"  <?php echo  $image_required?> onchange="loadfile(event)" >
                                 <img src="dist/img/product/<?php echo $productimage; ?>" class="img-fluid" id="preimage">
                                 <!-- //* image preview js / -->
                                 <script type="text/javascript">
                                       function loadfile(event){
                                       var output=document.getElementById('preimage');
                                       output.src=URL.createObjectURL(event.target.files[0]);
                                       };
                                 </script>
                              </div>
                              <div class="col-md-3 mb-3">
                                 <label class=" form-control-label">image 1</label>
                                 <input type="file" name="pro_image1" class="form-control" <?php echo  $image_required?> onchange="loadfile1(event)" >
                                 <img src="dist/img/product/<?php echo $productimage1; ?>" class="img-fluid" id="preimage1">
                                 <!-- //* image preview js / -->
                                 <script type="text/javascript">
                                       function loadfile1(event){
                                       var output=document.getElementById('preimage1');
                                       output.src=URL.createObjectURL(event.target.files[0]);
                                       };
                                 </script>
                              </div>
                              <div class="col-md-3 mb-3">
                                 <label class="form-control-label">image 2</label>
                                 <input type="file" name="pro_image2" class="form-control" <?php echo  $image_required?> onchange="loadfile2(event)" >
                                 <img src="dist/img/product/<?php echo $productimage2; ?>" class="img-fluid" id="preimage2">
                                 <!-- //* image preview js / -->
                                 <script type="text/javascript">
                                       function loadfile2(event){
                                       var output=document.getElementById('preimage2');
                                       output.src=URL.createObjectURL(event.target.files[0]);
                                       };
                                 </script>
                              </div>
                              <div class="col-md-3 mb-3">
                                 <label class=" form-control-label">image 3</label>
                                 <input type="file" name="pro_image3" class="form-control" <?php echo  $image_required?> onchange="loadfile3(event)" >
                                 <img src="dist/img/product/<?php echo $productimage3; ?>" class="img-fluid" id="preimage3">
                                 <!-- //* image preview js / -->
                                 <script type="text/javascript">
                                       function loadfile3(event){
                                       var output=document.getElementById('preimage3');
                                       output.src=URL.createObjectURL(event.target.files[0]);
                                       };
                                 </script>
                              </div>
                           </div>
                           <div class="form-group">
                              <label  class=" form-control-label">Short Description</label>
                              <textarea name="pro_short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc; ?></textarea>
                           </div>							
                           <div class="form-group">
                              <label  class=" form-control-label">Description</label>
                              <textarea name="content_box" id="textarea" placeholder="Enter product description" class="form-control"  rows="5"><?php echo $description; ?></textarea>
                           </div>							
                           <div class="form-group">
                              <label class=" form-control-label">Availability</label>
                              <select class="form-control" name="pro_avail">
                                 <option value="<?php echo $availability;?>"><?php echo $availability;?></option>
                                 <option>Select</option>
                                 <option value="In Stock">In Stock</option>
                                 <option value="Out Of Stock">Out Of Stock</option>
                              </select>
                           </div>							
                           <div class="form-group">
                              <label class=" form-control-label">Shipping Charges</label>
                              <select class="form-control" name="pro_shipping">
                                 <option value="<?php echo $shipping_charges;?>"><?php echo $shipping_charges;?></option>
                                 <option>Select</option>
                                 <option value="Free">Free</option>
                                 <option value="29">29/-</option>
                                 <option value="45">45/-</option>
                                 <option value="59">59/-</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label class=" form-control-label">Meta Title</label>
                              <textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title; ?></textarea>
                           </div>								
                           <div class="form-group">
                              <label class=" form-control-label">Meta Description</label>
                              <textarea name="meta_desc" placeholder="Enter product meta description"  rows="5" class="form-control"><?php echo $meta_desc; ?></textarea>
                           </div>							
                           <div class="form-group">
                              <label class=" form-control-label">Meta Keyword</label>
                              <textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword; ?></textarea>
                           </div>
                        							
                           <button name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span >Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg?></div>
							   </div>
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