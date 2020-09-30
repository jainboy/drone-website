<?php
include 'link.php';
include 'navigation.php';
include './admin1/db/db.php';
include 'functions.php';
$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
	$get_product=get_product($con,'','',$product_id);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>
<section class="clean-block clean-catalog dark">
    <div class="container-fluid">
        <div class="block-heading">
            <h2 class="text-info">Product Page</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-2">
                    <div class="d-none d-md-block">
                        <div class="filters">
                            <div class="filter-item">
                                <h3>Categories</h3>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                            </div>
                            <div class="filter-item">
                                <h3>Brands</h3>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                            </div>
                            <div class="filter-item">
                                <h3>OS</h3>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                        <div class="collapse"
                            id="filters">
                            <div class="filters">
                                <div class="filter-item">
                                    <h3>Categories</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>Brands</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>OS</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 clean-block clean-product">
                    <div class="container">
                        <div class="block-content">
                            <div class="product-info">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <div class="sp-wrap">
                                                <a href="./admin1/dist/img/product/<?php echo $get_product['0']['pro_image']?>"><img class="img-fluid d-block mx-auto" src="./admin1/dist/img/product/<?php echo $get_product['0']['pro_image']?>"></a>
                                                <a href="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img1']?>"><img class="img-fluid d-block mx-auto" src="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img1']?>"></a>
                                                <a href="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img2']?>"><img class="img-fluid d-block mx-auto" src="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img2']?>"></a>
                                                <a href="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img3']?>"><img class="img-fluid d-block mx-auto" src="./admin1/dist/img/product/<?php echo $get_product['0']['pro_img3']?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info">
                                            <h3><?php echo $get_product['0']['pro_name']?></h3>
                                            <h4 class="rating">Category:&nbsp; <?php echo $get_product['0']['pro_cat']?></h4>
                                            <div class="price">
                                                <h3>₹ <?php echo $get_product['0']['pro_sell_price']?></h3><br/>
                                                <p><span>Quantity:</span> 
                                                    <select id="qty" class="sin__desc text-danger">
                                                    <option value="0">select</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    </select>
                                                </p><br/>
                                                <div class="summary">
                                                <p><?php echo $get_product['0']['pro_short']?></p>
                                            </div>
                                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $get_product['0']['id']?>','add')" class="btn btn-outline-danger"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div>
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">Description</a></li>
                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Specifications</a></li>
                                        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#reviews">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane active fade show description" role="tabpanel" id="description">
                                            <p><?php echo $get_product['0']['pro_des']?></p>
                                        </div>
                                        <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                            <div class="table-responsive table-bordered">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="stat">Display</td>
                                                            <td>5.2"</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="stat">Camera</td>
                                                            <td>12MP</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="stat">RAM</td>
                                                            <td>4GB</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="stat">OS</td>
                                                            <td>iOS</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                            <div class="reviews">
                                                <div class="review-item">
                                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                                    <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="clean-block clean-catalog">
            <div class="clean-related-items">
                <h3>Related Products</h3>
                <div class="items">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-lg-4">
                            <div class="clean-related-item">
                                <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <h4>$300</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="clean-related-item">
                                <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <h4>$300</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="clean-related-item">
                                <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="assets/img/tech/image2.jpg"></a></div>
                                <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <h4>$300</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>