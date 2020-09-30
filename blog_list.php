<?php
include 'link.php';
include 'navigation.php';
include './admin1/db/db.php';

$sql="SELECT * FROM `blog_article`";
 $res1=mysqli_query($con,$sql);
 $total_record=mysqli_num_rows($res1);
 $per_page=4;

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

$sql.="WHERE status='1' ORDER BY `title` ASC limit $start,$per_page";
$res=mysqli_query($con,$sql);
?>
   <section class="clean-block clean-blog-list dark">
        <div class="container-fluid">
            <div class="block-heading">
                <h2 class="text-info">Latest Articles</h2>
                <p>For getting latest information of our site connecting with us by reading our latest arrival blogs on every news trending topics </p>
            </div>
            <div class="block-content">
                <div class="clean-blog-post">
                    <?php while($row=mysqli_fetch_array($res)){?> 
                        <div class="row">                     
                            <div class="col-lg-5">
                                <a href="blog?id=<?php echo $row['id']?>"><img class="rounded img-fluid" src="./admin1/dist/img/article/<?php echo $row['blog_image']; ?>"></a>
                            </div>
                            <div class="col-lg-7">
                                <h3><?php echo $row['title']; ?></h3>
                                <div class="info"><span class="text-muted">Jan 16, 2018 by&nbsp;<a href="blog">John Smith</a></span></div>
                                <p><?php echo substr(strip_tags($row['content']),0,250); ?></p>
                                <a href="blog?id=<?php echo $row['id']?>"><button class="btn btn-outline-primary btn-sm" type="button">Read More</button></a>
                            </div>
                        </div><br><hr><br>
                    <?php } ?>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <nav class="d-lg-flex justify-content-lg-middle dataTables_paginate paging_simple_numbers">
                        <ul class="pagination mx-auto">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <?php
                            for($i=1;$i<=$num;$i++){
                                echo '<li class="page-item active"><a class="page-link" href="blog_list?start='.$i.'">'.$i.'</a></li> &nbsp;';
                            }
                            ?>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            </div>
        </div>
    </section>
<?php include 'footer.php';?>