<?php
include 'link.php';
include 'navigation.php';
include './admin1/functions.php';
include './admin1/db/db.php';
$id=$_GET['id'];
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"SELECT * From blog_article WHERE id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $content=$row['content']; 
        $author=$row['author'];
        $category=$row['category']; 
        $date=$row['date']; 
        $image=$row['blog_image'];
    }
    else{
        header('location:blog');
         die();
      }
}
?>
<section class="clean-block clean-post dark">
    <div class="container">
        <div class="block-content">
            <div class="post-image">
                <img class="img-fluid banner1" src="./admin1/dist/img/article/<?php echo $image ?>">
            </div><br/><br/><hr>
            <div class="post-body">
                <h3><?php echo $title ?></h3>
                <div class="post-info"><span>&nbsp;<?php echo $author ?></span><span>&nbsp;<?php echo date_format(new DateTime($date),'d-M-Y'); ?> </span>
                <span style="text-transform: uppercase;color: #005446;">&nbsp;<?php echo $category ?> </span></div>
                <p><?php echo $content ?></p>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>