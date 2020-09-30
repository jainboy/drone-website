<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">HawaiADDA</a>
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index">Home</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="about_us">Features</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="gallery">Gallery</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="shop">Shop</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blog_list">Blog</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="services">services</a></li> -->
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact_us">Contact Us</a></li>
                    <li class="nav-item" role="presentation"><i class="fa fa-search icon-spaceing"></i></li>
                    <?php if($_SESSION['USER_LOGIN']){ ?>
                         <li class="nav-item" role="presentation"><a class="nav-link" href="./customer/customer_dashboard">| <?php echo $_SESSION['USER_NAME'] ?> |</a></li>
                    <?php } else{ ?>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="customer_sign_up">| Log in/Sign Up |</a></li>
                        <?php } ?>
                    <li class="nav-item" role="presentation"><i class="fa fa-shopping-bag icon-spaceing"></i><span class="cart-item"><?php echo $totalProduct?></span></li>
                    <li class="nav-item" role="presentation"><i class="fa fa-heart icon-spaceing"></i><span class="cart-item"><?php echo $wishlist_count?></span></li>
                </ul>
            </div>
        </div>
    </nav>