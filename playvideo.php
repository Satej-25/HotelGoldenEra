<?php
if (!isset($_GET['file'])) {
    die("No video specified.");
}

$videoFile = basename($_GET['file']); // sanitize input
$videoPath = "admin/Res_img/dishes/" . $videoFile;

if (!file_exists($videoPath)) {
    die("Video not found.");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Now Playing: <?php echo htmlspecialchars($videoFile); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #3a3a52);
            color: #fff;
        }

        header .navbar {
            background-color: transparent !important;
            padding: 1rem 2rem;
        }

        .navbar-brand img {
            width: 120px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #ffce00 !important;
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 4rem 1rem;
            text-align: center;
        }

        .video-card {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            max-width: 90%;
            width: 1000px;
        }

        .video-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        video {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        footer {
            background: rgba(0, 0, 0, 0.3);
            padding: 3rem 1rem;
            margin-top: 4rem;
        }

        .footer h5 {
            color: #ffce00;
            margin-bottom: 1rem;
        }

        .footer p, .footer a {
            color: #ddd;
            text-decoration: none;
        }

        .footer img {
            width: 40px;
            margin-right: 10px;
            
            transition: filter 0.3s ease;
        }

        .footer img:hover {
            filter: grayscale(0%);
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="index.php">
                <img src="images/gelogo2.png" alt="Logo">
            </a>
            <div class="d-flex align-items-center">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item mx-2"><a class="nav-link" href="index1.php">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="your_orders.php">My Orders</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>


<section class="hero-section">
    <div class="video-card">
        <div class="video-title">🎥 Now Playing: <?php echo htmlspecialchars($videoFile); ?></div>
        <video controls autoplay>
            <source src="<?php echo $videoPath; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<footer class="footer text-center">
    <div class="container">
        <div class="row text-md-start">
            <div class="col-md-3 mb-4">
                <h5>Payment Options</h5>
                <div>
                    <img src="images/paypal.png" alt="Paypal">
                    <img src="images/mastercard.png" alt="Mastercard">
                    <img src="images/maestro.png" alt="Maestro">
                    <img src="images/stripe.png" alt="Stripe">
                    <img src="images/bitcoin.png" alt="Bitcoin">
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Address</h5>
                <p>Near D Mart, Rankala</p>
                <p><strong>Phone:</strong> 9112348220</p>
            </div>
            <div class="col-md-5 mb-4">
                <h5>Additional Information</h5>
                <p>Join our café to enjoy delicious food and relaxing vibes with your loved ones.</p>
            </div>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

