<?php 
$con=mysqli_connect('localhost','root','','cars-specification');
if($con==false)
{
    ?>
    <script>
        alert('connection error');
    </script>
    <?php
}
?>