<?php
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
   }
   
   if($type=='duplicate'){
      $id=get_safe_value($con,$_GET['id']);
      $duplicate_sql="INSERT INTO `product`(`id`, `pro_cat`, `pro_sub_cat`, `pro_name`, `pro_mrp`, `pro_sell_price`, `pro_qty`, `pro_short`, `pro_des`, `pro_status`, `pro_shipping`, `pro_meta_title`, `pro_meta_desc`, `pro_meta_keyword`, `status`, `duplicate`) SELECT 'max(id)+1', `pro_cat`, `pro_sub_cat`, `pro_name`, `pro_mrp`, `pro_sell_price`, `pro_qty`,`pro_short`, `pro_des`, `pro_status`, `pro_shipping`, `pro_meta_title`, `pro_meta_desc`, `pro_meta_keyword`, `status`,`duplicate`='duplicate+1' from product  WHERE `id`='$id'";
      mysqli_query($con,$duplicate_sql);
   }
 }
 
 $sql="SELECT * FROM `product`";
 $res1=mysqli_query($con,$sql);
 $total_record=mysqli_num_rows($res1);
 $per_page=8;

$num=floor($total_record/$per_page);
$rem=floor($total_record%$per_page);
if($rem>0){
	$num++;
}
$start=0;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	$start=($start-1)*$per_page;
}

$search=0;
 if(isset($_POST['search-txt']) && $_POST['search-txt']!=''){
    $search=$_POST['search-txt'];
    $sql.="WHERE `title` LIKE '%$search%' OR `category` LIKE '%$search%'";
}
$sql.="ORDER BY `pro_name` ASC limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button class="btn btn-info"> <a href="manage_product" class="alink"> Add New</a></button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead class="text-info">
                    <tr>
                      <th>#</th>                                   
                      <th>Name</th>
                      <th>cateory</th>
                      <th>Sub-category</th>
                      <th>price</th>
                      <th>image</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
										$i=1;
										while($row=@mysqli_fetch_assoc($res)){?>
                                 <tr>
                                       <td>  <?php echo $i++;?>  </td>
                                       <td><?php   echo $row['pro_name'];    ?> </td>
                                       <td>  <?php   echo $row['pro_cat'];    ?>  </td>
                                       <td><?php   echo $row['pro_sub_cat'];    ?> </td>
                                       <td>  <?php   echo $row['pro_sell_price'];    ?>  </td>
                                       <td> <img src="./dist/img/product/<?php echo $row['pro_image'];  ?>"  style="max-width:60px;"  ></td>        				   		                                  
									   <td>
                             <?php echo "<span class='badge badge-edit'><a href='manage_product?id=".$row['id']."'><i class='fa fa-edit'></i></a></span>&nbsp;"; ?>
                             <?php echo "<span class='badge badge-duplicate'><a href='?type=duplicate&id=".$row['id']."'><i class='fa fa-file'></i></a></span>"; ?>   
                             <?php echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'><i class='fa fa-trash'></i></a></span>"; ?>                                     
											</td><td><?php
												if($row['status']==1){
													echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'><i class='fa fa-eye'></i></a></span>&nbsp;";
												}else{
													echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'><i class='fa fa-eye-slash'></i></a></span>&nbsp;";
												} ?>
										</td>      
                                    </tr>
                                    <?php } ?>                                   
                                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
		<div class="row">
			<div class="col-sm-12 col-md-5">
				<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Total Records of <?php echo mysqli_num_rows($res);?> entries
				</div>
			</div>
			<div class="col-sm-12 col-md-7">
				<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
					<ul class="pagination">
			      <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
            <?php
              for($i=1;$i<=$num;$i++){
                  echo '&nbsp;<li class="page-item active"><a class="page-link" href="blog.php?start='.$i.'">'.$i.'</a></li> &nbsp;';
              }
            ?>
						<li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include 'footer.php';
?>