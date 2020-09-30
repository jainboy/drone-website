<?php 
$con=mysqli_connect('localhost','root','','hawaiadda');
if($con==false)
{
    ?>
    <script>
        alert('connection error');
    </script>
    <?php
}
?>