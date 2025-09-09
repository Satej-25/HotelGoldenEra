<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>hotel menu</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    <style>
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
           
            <div class="inner-page-hero bg-image" data-image-src="images/img/pimg.jpg">
                <div class="container"> </div>
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">     
                    </div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																
															</div>
															<!-- end:Entry description -->
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		<a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn btn-purple">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }
						
						
						?>
                                    
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
</body>
</html>