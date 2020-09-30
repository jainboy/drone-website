<?php
include 'link.php';
include 'db/db.php';
include 'functions.php';
include 'topbar.php';
include 'sidebar.php';

$start=date('Y-m-d').' 00-00-00';
$end=date('Y-m-d').' 23-59-59';
$sql="SELECT * FROM `customer_order` WHERE `added_on` BETWEEN '$start' and '$end'";
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
    $sql.="WHERE `email` LIKE '%$search%' OR `username` LIKE '%$search%'";
}
$sql.="ORDER BY `added_on` DESC limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h3 class="text-info">TODAY ORDER</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_dashboard">Home</a></li>
              <li class="breadcrumb-item active">Today Order</li>
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
                      <th>Order Id</th>
                      <th>Product Name</th>
                      <th>Mobile</th>
                      <th>Shipping Address</th>
                      <th>Amount</th>
                      <th>Order Date</th>
                      <th>Status</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 							
										while($row=@mysqli_fetch_assoc($res)){
                                 $order_date=$row['added_on'];
                                 $order_status=$row['order_status'];
                                 ?>       
                                 <tr>
                                       <td>  <?php  echo $row['order_id'];  ?>  </td>
                                       <td><?php   echo $row['firstname'].' '.$row['lastname'];      ?> </td>
                                       <td>  <?php   echo $row['mobile'];    ?>  </td>
                                       <td><?php   echo $row['street']."<br/>". $row['city']."<br/>".$row['zip'];   ?> </td>                                      
                                       <td>  <?php   echo $row['order_total'];    ?>  </td>
                                       <td><?php echo date_format(new DateTime($order_date),'d-m-Y');?> </td> 
                                       <td>  <?php   echo $order_status;    ?>  </td>  
                                       <td>
                                          <?php
                                          if($order_status=='complete')  {
                                          echo "<span class='badge badge-complete'><a href='invoice.php?order_id=".$row['order_id']."'><i class='fa fa-print'></i></a></span>";
                                          }  
                                          else{
                                             echo "<span class='badge badge-pending'><a href='update_order_status.php?order_id=".$row['order_id']."'><i class='fa fa-wrench'></i></a></span>&nbsp;";
                                          } 				   		                                        
                                          ?>                
                                         
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