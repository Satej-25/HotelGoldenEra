<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();
include_once 'product-action.php'; 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/logo.png" type="image/png">
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        .navbar {

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand img {
            transition: all 0.3s ease;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2));
        }
        
        .navbar-brand img:hover {
            transform: scale(1.05);
        }
        
        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link.active {
            color:rgb(18, 8, 2);
            background-color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .footer {
            background: linear-gradient(135deg, #2d2926 0%, #1a1818 100%);
            color: #fff;
            padding: 70px 0 30px;
        }
        
        .footer h5 {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 12px;
            letter-spacing: 1px;
        }
        
        .footer h5:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #ff8c42, #d90429);
            border-radius: 2px;
        }
        
        .footer p, .footer a {
            color: #ddd;
            transition: all 0.3s ease;
        }
        
        .footer a:hover {
            color: #ff8c42;
            text-decoration: none;
            transform: translateX(3px);
            display: inline-block;
        }
        
        .payment-options ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }
        
        .payment-options li {
            margin-right: 12px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
            background: #fff;
            padding: 6px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .payment-options li:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
        
        .payment-options img {
            height: 35px;
            transition: all 0.3s ease;
        }
        
        .bottom-footer {
            padding-top: 30px;
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .social-icons a {
            display: inline-block;
            margin-right: 12px;
            color: #fff;
            background: rgba(255,255,255,0.1);
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: #ff8c42;
            color: #fff;
            transform: translateY(-5px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(135deg, #ff8c42, #fcb045);
            color: white;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 99;
        }
        
        .back-to-top.active {
            opacity: 1;
            visibility: visible;
            animation: pulse 2s infinite;
        }
        
        .back-to-top:hover {
            background: linear-gradient(135deg, #d90429, #ef233c);
            color: white;
        }
        
        /* How it works section */
        .how-it-works {
            background: linear-gradient(135deg, #f9f5f0 0%, #fff 100%);
            padding: 80px 0;
        }
        
        .how-it-works-icon {
            width: 110px;
            height: 110px;
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 2px solid rgba(255,140,66,0.1);
            transition: all 0.3s ease;
        }
        
        .how-it-works-steps:hover .how-it-works-icon {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            border-color: rgba(255,140,66,0.3);
        }
        
        .how-it-works-steps h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #2d2926;
        }
        
        .how-it-works-steps p {
            color: #5d5d5d;
            font-size: 1rem;
            max-width: 300px;
            margin: 0 auto;
        }
        .btnhover:hover{
            background: linear-gradient(135deg,rgb(11, 64, 128),rgb(15, 76, 129));
            border-radius: 10px;
        }
        .btn{
            background: linear-gradient(135deg,rgb(60, 96, 141),rgb(56, 58, 61));
            border-radius: 10px;
        }
        .gbtn{
            background: linear-gradient(135deg,rgb(36, 121, 42),rgb(35, 116, 43)) ;
        }
    </style>
</head>

<body>

  <header id="header" class="header-scroll top-header headroom">
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"> 
                    <img class="img-rounded" style="width:40%" src="images/gelogo2.png" alt="Hotel Golden Era"> 
                </a>
                <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> 
                            <a class="nav-link active" href="index1.php">
                                <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link active" href="restaurants.php">
                                <i class="fa fa-cutlery"></i> Hotel<span class="sr-only"></span>
                            </a> 
                        </li>
                        <li class="nav-item">
                            <a href="table_no.php" class="nav-link active">
                                <i class="fa fa-table"></i> <?php echo isset($_SESSION["table_no"]) ? 'Table Number: '.$_SESSION["table_no"] : 'Set Table'; ?>
                            </a>
                        </li>
                        <?php
                            echo '<li class="nav-item">
                                <a href="your_orders.php" class="nav-link active">
                                    <i class="fa fa-shopping-bag"></i> My Orders
                                </a> 
                            </li>';
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="page-wrapper">
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    
                </ul>
            </div>
        </div>

        <?php 
            $ress = mysqli_query($db, "SELECT * FROM restaurant WHERE rs_id='$_GET[res_id]'");
            $rows = mysqli_fetch_array($ress);
        ?>

        <section class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="images/logo.png" alt="Restaurant logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="breadcrumb">
            <div class="container"></div>
        </div>

        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">Your Cart</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                <div class="title-row">
                                    <?php echo $item["title"]; ?>
                                    <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>"><i class="fa fa-trash pull-right"></i></a>
                                </div>
                                <div class="form-group row no-gutter">
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control b-r-0" value="<?php echo '₹'.$item["price"]; ?>" readonly>
                                    </div>
                                    <div class="col-xs-4">
                                        <input class="form-control" type="text" readonly value="<?php echo $item["quantity"]; ?>">
                                    </div>
                                </div>
                                <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo '₹'.$item_total; ?></strong></h3>
                                <?php if ($item_total == 0) { ?>
                                    <a href="#" class="btn btn-danger btn-lg disabled gbtn">Checkout</a>
                                <?php } else { ?>
                                    <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn btn-success btn-lg active">Checkout</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                MENU 
                                <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php  
                                $stmt = $db->prepare("SELECT * FROM dishes");
                                $stmt->execute();
                                $products = $stmt->get_result();
                                if (!empty($products)) {
                                    foreach ($products as $product) {
                            ?>
                            <div class="food-item">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-lg-8">
                                        <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#">
                                                    <?php echo '<img src="admin/Res_img/dishes/'.$product['img'].'" alt="Food logo">'; ?>
                                                </a>
                                            </div>
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p><?php echo $product['slogan']; ?></p>
                                            </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-lg-3 pull-right item-cart-info"> 
                                        <span class="price pull-left">₹<?php echo $product['price']; ?></span>
                                        <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1" size="2" />
                                        <input type="submit" class="btn theme-btn btnhover" style="margin-left:40px;" value="Add To Cart" />
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 about-company">
                    <h5>About Hotel Golden Era</h5>
                    <p>Experience culinary excellence at our renowned restaurant. We offer a variety of delicious dishes prepared by expert chefs.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook-square fa-lg"></i></a>
                        <a href="#"><i class="fa fa-twitter-square fa-lg"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 quick-links">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index1.php"><i class="fa fa-angle-right"></i> Home</a></li>
                        <li><a href="restaurants.php"><i class="fa fa-angle-right"></i> Menu</a></li>
                        <li><a href="your_orders.php"><i class="fa fa-angle-right"></i> Your Orders</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="row">
                        <div class="col-xs-12 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li><a href="#"> <img src="images/paypal.png" alt="Paypal"> </a></li>
                                <li><a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a></li>
                                <li><a href="#"> <img src="images/maestro.png" alt="Maestro"> </a></li>
                                <li><a href="#"> <img src="images/stripe.png" alt="Stripe"> </a></li>
                                <li><a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 address color-gray">
                            <h5>Address</h5>
                            <p><i class="fa fa-map-marker"></i> Near D Mart, Rankala, Kolhapur</p>
                            <h5><i class="fa fa-phone"></i> Phone: 9765559968</h5>
                            <p><i class="fa fa-envelope"></i> Email: info@goldenera.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <p>&copy; <?php echo date('Y'); ?> Hotel Golden Era. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to top button -->
    <a href="#" class="back-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    
    <script>
        // Initialize WOW.js for animations
        new WOW().init();
        
        // Initialize Background Images
        $(document).ready(function() {
            $('.bg-image').each(function() {
                var src = $(this).data('image-src');
                $(this).css('background-image', 'url(' + src + ')');
                $(this).css('background-size', 'cover');
                $(this).css('background-position', 'center center');
            });
            
            // Back to top button
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('.back-to-top').addClass('active');
                } else {
                    $('.back-to-top').removeClass('active');
                }
            });
            
            $('.back-to-top').click(function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 800);
                return false;
            });
            
            // Smooth scroll for in-page links
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                
                var target = this.hash;
                var $target = $(target);
                
                $('html, body').animate({
                    'scrollTop': $target.offset().top - 80
                }, 800, 'swing');
            });
            
            // Add hover effects to food items
            $('.food-item-wrap').hover(
                function() {
                    $(this).find('.figure-wrap').css('transform', 'scale(1.05)');
                },
                function() {
                    $(this).find('.figure-wrap').css('transform', 'scale(1)');
                }
            );
        });
    </script>
</body>

</html>
