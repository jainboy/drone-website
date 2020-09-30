<?php
include 'link.php';
include 'navigation.php';
include './admin1/db/db.php';
ob_start();
    if(isset($_POST['loginsubmit'])){
        $username=$_POST['email'];
        $password=$_POST['password'];
        $res=mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$username' AND `password`='$password'");
            $check_user=mysqli_num_rows($res);
            if($check_user>0){
                $row=mysqli_fetch_assoc($res);
                session_start();
                $_SESSION['USER_LOGIN']='yes';
                $_SESSION['USER_ID']=$row['id'];
                $_SESSION['USER_NAME']=$row['name'];      
                $_SESSION['USER_IMAGE']=$row['image'];    
                header ("location:shop");
            }
            else
            {
            ?>
            <script>
                alert('username and password invalid !!');
                window.open('customer_sign_up','_self');
            </script>
            <?php        
            }
        }
?>
<br><br><br>
<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Log In</h3>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" required />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="loginsubmit" class="btnSubmit"/>
                </div>
            </form>
            <div class="form-group">
                <a href="#" class="btnForgetPwd">Forget Password?</a>
            </div>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="login-logo">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            </div>
            <h3>Sign Up</h3>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Pasword *" value="" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="ragistersubmit" class="btnSubmit" value="Login" />
                    </div>
                </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>