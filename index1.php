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
    <meta name="description" content="Hotel Golden Era - Delicious food ordering platform">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">
    <title>Hotel Golden Era | Home</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        /* Custom Enhanced Styles with Vibrant Food-themed Color Palette */
        body {
            font-family: 'Poppins', sans-serif;
            background-color:rgb(243, 239, 235);
            color: #2d2926;
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
        
        /* Hero Section */
        .hero {
            height: 80vh;
            position: relative;
            overflow: hidden;
            background-attachment: fixed;
        }
        
        .hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .hero-inner {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
        }
        
        .hero-text {
            animation: fadeInUp 1s ease;
        }
        
        .hero-text h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
            letter-spacing: 1px;
        }
        
        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px rgba(227, 216, 216, 0.3);
        }
        
        .cta-btn {
            background: linear-gradient(to right,rgb(14, 13, 13),rgb(45, 43, 43));
            color: white;
            padding: 14px 32px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 20px;
            border: none;
            box-shadow: 0 6px 20px rgba(217, 4, 41, 0.3);
        }
        
        .cta-btn:hover {
            background: linear-gradient(to right, #ef233c, #d90429);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(217, 4, 41, 0.4);
            color: white;
            text-decoration: none;
        }
        
        /* Popular Section */
        .popular {
            padding: 80px 0;
            background-color: #fff;
            background-image: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z" fill="%23ff8c4210" fill-opacity="0.08" fill-rule="evenodd"/></svg>');
        }
        
        .title h2 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #2d2926;
            position: relative;
            display: inline-block;
        }
        
        .title h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right,rgb(113, 107, 103), #d90429);
            border-radius: 2px;
        }
        
        .title p.lead {
            color: #5d5d5d;
            margin-bottom: 50px;
            font-size: 1.2rem;
            padding-top: 15px;
        }
        
        /* Food Item Cards */
        .food-item {
            margin-bottom: 30px;
        }
        
        .food-item-wrap {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .food-item-wrap:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
        }
        
        .figure-wrap {
            height: 220px;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .figure-wrap:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
            opacity: 0;
            transition: all 0.4s ease;
        }
        
        .food-item-wrap:hover .figure-wrap:before {
            opacity: 1;
        }
        
        .content {
            padding: 25px 20px;
        }
        
        .content h5 a {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d2926;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .content h5 a:hover {
            color: #d90429;
        }
        
        .product-name {
            color: #5d5d5d;
            margin-bottom: 15px;
            font-style: italic;
            font-size: 0.95rem;
        }
        
        .price-btn-block {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }
        
        .price {
            font-size: 1.4rem;
            font-weight: 800;
            color: #d90429;
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }
        
        .theme-btn-dash {
            background: linear-gradient(135deg, #ff8c42, #fcb045);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(255, 140, 66, 0.25);
        }
        
        .theme-btn-dash:hover {
            background: linear-gradient(135deg, #d90429, #ef233c);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 4, 41, 0.3);
        }
        
        /* Special badge */
        .special-badge {
            position: absolute;
            top: 20px;
            right: -35px;
            background: linear-gradient(135deg, #d90429, #ef233c);
            color: white;
            padding: 8px 40px;
            transform: rotate(45deg);
            font-size: 0.85rem;
            font-weight: 700;
            z-index: 10;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            letter-spacing: 1px;
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
    </style>
</head>

<body class="home">
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

    <!-- Hero Section -->
    <section class="hero bg-image" data-image-src="images/img/pimg.avif">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Hotel Golden Era</h1>
                <p class="lead">Exquisite dining experience with delicious cuisine</p>
                <a href="#popular-dishes" class="cta-btn">Explore Menu <i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </section>
    
    <!-- Popular Dishes Section -->
    <section id="popular-dishes" class="popular">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Dishes of the Month</h2>
                <p class="lead">Easiest way to order your favourite food among these top 6 dishes</p>
            </div>
            <div class="row">
                <?php 					
                    $query_res = mysqli_query($db,"select * from dishes LIMIT 6"); 
                    $count = 0;
                    while($r = mysqli_fetch_array($query_res))
                    {
                        $count++;
                        $specialBadge = ($count <= 2) ? '<span class="special-badge">Chef\'s Special</span>' : '';
                        
                        echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item wow fadeInUp" data-wow-delay="0.'.$count.'s">
                            <div class="food-item-wrap">
                                '.$specialBadge.'
                                <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'"></div>
                                <div class="content">
                                    <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                                    <div class="product-name">'.$r['slogan'].'</div>
                                    <div class="price-btn-block"> 
                                        <span class="price">₹'.$r['price'].'</span> 
                                        <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">
                                            <i class="fa fa-shopping-cart"></i> Order Now
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>';                                      
                    }	
                ?>
            </div>
            <div class="text-xs-center m-t-30">
                <a href="dishes.php" class="cta-btn">View All Menu <i class="fa fa-long-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="how-it-works">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Why Choose Us</h2>
                <p class="lead">We provide the best dining experience in town</p>
            </div>
            <div class="row text-center">
                <div class="col-xs-12 col-sm-4 how-it-works-steps white-txt">
                    <div>
                        <div class="how-it-works-icon">
                            <i class="fa fa-cutlery" style="font-size: 50px; color: #ff4757;"></i>
                        </div>
                        <h3>Quality Food</h3>
                        <p>We use only the finest ingredients to prepare our delicious dishes</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 how-it-works-steps white-txt">
                    <div>
                        <div class="how-it-works-icon">
                            <i class="fa fa-clock-o" style="font-size: 50px; color: #ff4757;"></i>
                        </div>
                        <h3>Fast Delivery</h3>
                        <p>Order your food and get it delivered to your table in minutes</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 how-it-works-steps white-txt">
                    <div>
                        <div class="how-it-works-icon">
                            <i class="fa fa-thumbs-up" style="font-size: 50px; color: #ff4757;"></i>
                        </div>
                        <h3>Best Service</h3>
                        <p>Our friendly staff is always ready to provide you with exceptional service</p>
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