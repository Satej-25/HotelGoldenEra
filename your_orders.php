<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['table_no']))  
{
    header('location:table_no.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Orders</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .panel-body {
            background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
            font: 600 15px "Open Sans", Arial, sans-serif;
        }
        label.control-label {
            font-weight: 600;
            color: #777;
        }
         /* Navbar Styling */
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

        
        /* Footer */
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
    </style>
</head>

<body>

<!-- Navbar -->
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
                            <a class="nav-link active" href="dishes.php">
                                <i class="fa fa-cutlery"></i> Dishes<span class="sr-only"></span>
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

    <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
        <div class="container"></div>
    </div>

    <section class="restaurants-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bg-gray">
                        <div class="row">
                            <div class="table-responsive" id="orders-table">
                                <table class="table table-bordered table-hover">
                                    <thead style="background: #404040; color:white;">
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            <th>Table Number</th>
                                            <th>Views</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Orders will be loaded here -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center my-4">
                                <form action="clear_orders.php" method="POST" onsubmit="return confirm('Are you sure you want to clear all orders?');">
                                    <button type="submit" class="btn btn-danger btn-lg">
                                        <i class="fa fa-trash"></i> Clear All Orders
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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
                        <li><a href="dishes.php"><i class="fa fa-angle-right"></i> Menu</a></li>
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
</div>

<script src="js/jquery.min.js"></script>
<script>
function refreshOrders() {
    $.ajax({
        url: "fetch_orders.php",
        method: "GET",
        success: function(data) {
            $("#orders-table tbody").html(data);
        }
    });
}

// First call and refresh every 5s
refreshOrders();
setInterval(refreshOrders, 500);
</script>
</body>
</html>
