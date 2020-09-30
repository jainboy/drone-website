<?php
include 'link.php';
include 'navigation.php';
include './admin1/db/db.php';
include 'functions.php';

?>
<section class="clean-block clean-cart dark">
    <div class="container-fluid">
        <div class="block-heading">
            <h2 class="text-info">Shopping Cart</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>
        <div class="content">
            <div class="row no-gutters">
                <div class="col-md-12 col-lg-9">
                    <div class="items">
                    <h1>Shopping cart</h1>
                  <p class="text-muted">You currently have <span class="corttext"><?php echo $totalProduct?></span> item(s) in your cart.</p>
                        <!-- <div class="product">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-3">
                                    <div class="product-image"><img class="img-fluid d-block mx-auto image" src="assets/img/tech/image2.jpg"></div>
                                </div>
                                <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                    <div class="product-specs">
                                        <div><span>Display:&nbsp;</span><span class="value">5 inch</span></div>
                                        <div><span>RAM:&nbsp;</span><span class="value">4GB</span></div>
                                        <div><span>Memory:&nbsp;</span><span class="value">32GB</span></div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="1"></div>
                                <div class="col-6 col-md-2 price"><span>$120</span></div>
                            </div>
                        </div> -->
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Product Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Discount</th>
                                <th>Shipping</th>
                                <th colspan="2">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $cart_total=0;
                                $total_price=0;                     
                                $shipping_charges=0; 
                                $shipping_value=0;
                                $sub_total=0;                       
                                if(isset($_SESSION['cart'])){                                  
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
                                    if($qty>0) {
                                    $shipping_value=$qty*$shipping;
                                    $sub_total=($qty*$price)+$shipping_value;                                       
                                    $shipping_charges=$shipping_charges+($qty*$shipping);
                                    $cart_total=$cart_total+$sub_total;
                                    $total_price=$cart_total-$shipping_charges;
                                    }                                                                                
                                else{
                                    echo 'Please select any quantity of the product';
                                }
                                ?>
                                <tr>
                                <td><a href="product.php?id=<?php echo $id?>"><img src="./admin1/dist/img/product/<?php echo $image ?>" alt="<?php echo $alttext?>" style="width:50px; height:60px;"></a></td>
                                <td><a href="product.php?id=<?php echo $id?>"><?php echo $pname?></a></td>
                                <td>
                                    <input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" class="form-control">
                                </td>
                                <td><?php echo $mrp?></td>
                                <td><?php echo $price?></td>
                                <td><?php echo $shipping.'*'.$qty.'='.$shipping_value?></td>
                                <td>₹<?php echo $sub_total?></td>
                                <td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                                    <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th colspan="6">Total</th>
                                <th colspan="2">₹ <?php echo $cart_total ?></th>
                                </tr>
                            </tfoot>
                        </table>
                         <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="./index.php" class="btn btn-outline-danger"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                    <div class="right">
                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')"><button class="btn btn-outline-success"><i class="fa fa-refresh"></i>Update cart</button></a>
                    <?php 
                      if($cart_total>0){
                          echo ' <button type="submit" class="btn btn-success">    <a href="checkout" style="color:white; text-decoration:none;">Proceed to checkout</a> <i class="fa fa-chevron-right"></i></button> ';
                      }
                      else{
                          echo ' <button type="submit" class="btn btn-warning">   <i class="fa fa-chevron-left"></i>  <a href="index" style="color:white; text-decoration:none;">Go Back</a></button> ';}
                      ?>
                    </div>
                  </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3">
                    <div class="summary">
                        <h3>Summary</h3>
                        <h4><span class="text">Subtotal</span><span class="price">$360</span></h4>
                        <h4><span class="text">Discount</span><span class="price">$0</span></h4>
                        <h4><span class="text">Shipping</span><span class="price">$0</span></h4>
                        <h4><span class="text">Total</span><span class="price">$360</span></h4><button class="btn btn-primary btn-block btn-lg" type="button">Checkout</button></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>