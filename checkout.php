 <?php
include 'link.php';
include 'navigation.php';
include './admin1/db/db.php';
include 'functions.php';
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
  ?>
  <script>
    window.location.href='index';
  </script>
  <?php
}						
if(!isset($_SESSION['USER_LOGIN'])){
  ?>
  <script>
    window.location.href='ragistration.php';
  </script>
<?php
}
  $firstname='';
  $lastname='';
  $email='';
  $phone='';
  $street='';
  $address='';
  $city='';
  $dist='';
  $state='';
  $zipcode='';
  $state='';
  $notes='';
if(isset($_SESSION['USER_LOGIN'])){
$user_id=$_SESSION['USER_ID'];
$res=mysqli_query($con,"SELECT * FROM `users` where id='$user_id'");
$check=mysqli_num_rows($res);
if($check>0){
  $row=mysqli_fetch_assoc($res);
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $email=$row['email'];
  $phone=$row['mobile'];
  $address=$row['address'];
  $street=$row['street'];
  $city=$row['city'];
  $dist=$row['dist'];
  $state=$row['state'];
  $zip=$row['zipcode'];
}
}

if(isset($_POST['submit'])){
$firstname=get_safe_value($con,$_POST['firstname']);
$lastname=get_safe_value($con,$_POST['lastname']);
$phone=get_safe_value($con,$_POST['phone']);
$email=get_safe_value($con,$_POST['email']);
$address=get_safe_value($con,$_POST['address']);
$street=get_safe_value($con,$_POST['street']);
$city=get_safe_value($con,$_POST['city']);
$dist=get_safe_value($con,$_POST['dist']);
$zip=get_safe_value($con,$_POST['zip']);
$state=get_safe_value($con,$_POST['state']);
$notes=get_safe_value($con,$_POST['notes']);
$user_id=$_SESSION['USER_ID'];

mysqli_query($con,"UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`mobile`='$phone',`street`='$street',`city`='$city',`dist`='$dist',`state`='$state',`zipcode`='$zip',`remark`='$notes' WHERE `id`='$user_id'");
?>
<script>
window.location.href='order';
</script>
<?php
}
?>
<section>
  <div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <?php
          if(isset($_SESSION['cart'])){
              $total_price=0;
              $shipping_charges=0;
              $cart_total=0;
              foreach($_SESSION['cart'] as $key=>$val){
              $productArr=get_product($con,'','',$key);
              $id=$productArr[0]['id'];
              $pname=$productArr[0]['pro_name'];
              $mrp=$productArr[0]['pro_mrp'];
              $price=$productArr[0]['pro_sell_price'];
              $alttext=$productArr[0]['pro_meta_desc'];
              $image=$productArr[0]['pro_image'];
              $shipping=$productArr[0]['pro_shipping'];
              $qty=$val['qty'];                                                                                   
              $shipping_value=$qty*$shipping;
              $sub_total=($qty*$price)+$shipping_value;                                       
              $shipping_charges=$shipping_charges+($qty*$shipping);
              $cart_total=$cart_total+$sub_total;
              $total_price=$cart_total-$shipping_charges;
              }}
          ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Order subtotal</h6>
          </div>
          <span class="text-muted">₹ <?php echo $total_price?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Shipping and handling</h6>
          </div>
          <span class="text-muted">₹ <?php echo $shipping_charges?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Tax</h6>
          </div>
          <span class="text-muted">₹ 0.00</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (RUPEES)</span>
          <strong>₹<?php echo $cart_total?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form method="post" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $firstname ?>"  required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $lastname ?>"  required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" name="email" value="<?php echo $email ?>"  placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>
        <div class="mb-3">
          <label for="mobile">Mobile</label>
          <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>"  placeholder="2222222222">
          <div class="invalid-feedback">
            Please enter a valid mobile no for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" value="<?php echo $address ?>" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
          <label for="street">Street</label>
          <input type="text" class="form-control" value="<?php echo $street ?>" name="street" placeholder="Apartment or suite">
          </div>
          <div class="col-md-6 mb-3">
          <label for="city">City</label>
            <input type="text" class="form-control" value="<?php echo $city?>" name="city" placeholder="City"> 
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="district">District</label>
            <input type="text" class="form-control" value="<?php echo $dist ?>" name="dist" placeholder="Apartment or suite">
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" required>
              <option value="">Choose...</option>
              <option>Andhra Pradesh</option>
              <option>Andaman and Nicobar Islands</option>
              <option>Arunachal Pradesh</option>
              <option>Assam</option>
              <option>Bihar</option>
              <option>Chandigarh</option>
              <option>Chhattisgarh</option>
              <option>Dadar and Nagar Haveli</option>
              <option>Daman and Diu</option>
              <option>Delhi</option>
              <option>Lakshadweep</option>
              <option>Puducherry</option>
              <option>Goa</option>
              <option>Gujarat</option>
              <option>Haryana</option>
              <option>Himachal Pradesh</option>
              <option>Jammu and Kashmir</option>
              <option>Jharkhand</option>
              <option>Karnataka</option>
              <option>Kerala</option>
              <option>Madhya Pradesh</option>
              <option>Maharashtra</option>
              <option>Manipur</option>
              <option>Meghalaya</option>
              <option>Mizoram</option>
              <option>Nagaland</option>
              <option>Odisha</option>
              <option>Punjab</option>
              <option>Rajasthan</option>
              <option>Sikkim</option>
              <option>Tamil Nadu</option>
              <option>Telangana</option>
              <option>Tripura</option>
              <option>Uttar Pradesh</option>
              <option>Uttarakhand</option>
              <option>West Bengal</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" value="<?php echo $zip ?>" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="country">Additional Notes</label>
            <textarea class="form-control" name="notes"></textarea>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="UPI" name="paymentMethod" type="radio" class="custom-control-input" value="UPI" required>
            <label class="custom-control-label" for="UPI">UPi</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="credit" value="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" value="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="COD" value="COD" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="COD">Cash On Delivery</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="Net_Banking" value="Net_Banking" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="Net_Banking">Net Bnaking</label>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
</div><br/><br/><br/>
</section>
  <?php
include 'footer.php';
?>