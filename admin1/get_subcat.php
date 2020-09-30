<?php
include 'db/db.php';
if(!empty($_POST["cat_name1"])) 
{
//  $id=intval($_POST['cat_id1']);
$cname=$_POST['cat_name1'];
$query=mysqli_query($con,"SELECT * FROM `sub-category` WHERE `main_category`='$cname'");
?>
<option value="">Select Subcategory</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo $row['sub_cat_name']; ?>"><?php echo $row['sub_cat_name']; ?></option>
  <?php
 }
}
?>