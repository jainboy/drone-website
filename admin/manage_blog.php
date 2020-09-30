<?php
    ob_start();
    include 'sidebar.php';
    include 'top.php';
    include 'functions.php';
    include './db/db.php';
    $title='';
    $content='';
    $author='';
    $date='';
    $image='';
    $meta_desc='';
    $meta_tags='';
    $msg='';
    $image_required='required';
   if(isset($_GET['id']) && $_GET['id']!=''){
      $image_required='';
      $id=get_safe_value($con,$_GET['id']);
      $res=mysqli_query($con,"SELECT * FROM `blog_article` WHERE `id`='$id'");
      $check=mysqli_num_rows($res);
      if($check>0){
         $row=mysqli_fetch_assoc($res);
         $title=$row['title'];
         $content=$row['content']; 
         $author=$row['author'];
         $image=$row['blog_image'];
         $meta_desc=$row['meta_desc']; 
         $meta_tags=$row['meta_tags'];
         //  $category=$row['category']; 
      }
      else{
        header('location:blog.php');
         die();
      }
   }

    if(isset($_POST['submit'])){
        $title=get_safe_value($con,$_POST['title']);
        $content=get_safe_value($con,$_POST['content']);
        $author=get_safe_value($con,$_POST['author']);
        $meta_desc=get_safe_value($con,$_POST['meta_desc']);
        $meta_tags=get_safe_value($con,$_POST['meta_tags']);

        // $categoryarr=get_safe_value($con,$_POST['category']);
        // $categoryarr=$_POST['category'];
        // $category='';
        // foreach($categoryarr as $category1){
        //     $category .=$category1.",";
        // }

        foreach($_POST['category'] as $categoryarr){
            $categoryarray[]=$categoryarr;
            $category= implode(",", $categoryarray);
        }
        $added_on=date('Y-m-d h:i:s');
        $res=mysqli_query($con,"SELECT * FROM `blog_article` WHERE `title`='$title'");
        $check=mysqli_num_rows($res);
        if($check>0){
            if(isset($_GET['id']) && $_GET['id']!=''){
                $getData=mysqli_fetch_assoc($res);
                if($id==$getData['id']){
                
                }else{
                    $msg="blog already exist";
                }
            }else{
                $msg="blog already exist";
            }
        } 
        if($msg==''){
            if(isset($_GET['id']) && $_GET['id']!=''){
                if($_FILES['image']['name']!=''){
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'./assets/img/article/'.$image);
                mysqli_query($con,"UPDATE `blog_article` SET `title`='$title',`content`='$content',`author`='$author',`category`='$category',`date`='$added_on',`blog_image`='$image',`meta_desc`='$meta_desc',`meta_tags`='$meta_tags' WHERE `id`='$id'");
            }
            else{
                mysqli_query($con,"UPDATE `blog_article` SET `title`='$title',`content`='$content',`author`='$author',`category`='$category',`date`='$added_on',`meta_desc`='$meta_desc',`meta_tags`='$meta_tags' WHERE `id`='$id'");
            }
        }else{
                $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'./assets/img/article/'.$image);
                mysqli_query($con,"INSERT INTO `blog_article`(`title`, `content`, `author`, `category`,`date`,`blog_image`,`status`,`meta_desc`, `meta_tags`) VALUES ('$title','$content','$author','$category','$added_on','$image','1','$meta_desc','$meta_tags')");
            }
            header('location:blog.php');
            die();
        }
    }
 ?>
    <div class="card shadow adjestment">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold">Blog</p>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label><strong>Title</strong></label>
                    <input class="form-control" type="text" value="<?php echo $title?>"name="title">
                </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label><strong>Description</strong></label>
                                <textarea class="form-control" id="textarea" name="content" rows="20"><?php echo $content?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Author</strong></label>
                                        <input class="form-control" type="text" name="author" value="<?php echo $author?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label><strong>Blog Image</strong></label>
                                        <?php if($image!=''){?>
                                            <input type="file" name="image" class="form-control" <?php echo  $image_required?> onchange="loadfile1(event)" >
                                            <img src="./assets/img/article/<?php echo $image; ?>" id="image" style="margin-top:30px; width:100%; height:100px;">
                                        <?php    }
                                        else{?>   <input type="file" name="image" class="form-control" onchange="loadfile1(event)">
                                                <img src="./assets/img/article/kaspersky.gif" id="image" style="border:3px dotted red;margin-top:30px; width:300px; height:100px;">
                                            <?php         } ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><strong>Category</strong></label><br/>
                                <?php 
                                    $query=mysqli_query($con,"SELECT `category_name` FROM `category` WHERE `status`='1'");
                                    while($row=mysqli_fetch_array($query)){?>
                                <input type="checkbox" name="category[]" value="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?> <br/><?php    } ?>
                            </div>
                            <div class="form-group">
                                <label><strong>Mata Description</strong></label><br/>
                                <textarea class="form-control" name="meta_desc" rows="10"><?php echo $meta_desc?></textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Mata tags</strong></label><br/>
                                <textarea class="form-control" name="meta_tags" rows="5"><?php echo $meta_tags?></textarea>
                            </div>
                        </div>
                    </div>
                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="submit">Save&nbsp;</button></div>
                <div class="field_error"><?php echo $msg?></div>
            </form>
        </div>
    </div>
        <!-- //* image preview js / -->
            <script type="text/javascript">
                function loadfile1(event){
                var output=document.getElementById('image');
                output.src=URL.createObjectURL(event.target.files[0]);
                };
            </script>
<?php
include 'footer.php';
?>