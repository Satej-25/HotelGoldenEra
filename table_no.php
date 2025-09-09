<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Table</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #5c4ac7;
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
            background-color: black;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
	  </style>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
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
                        
                        <?php
                            if(empty($_SESSION["t_id"])) // if user is not login
                                {
                                    echo '<li class="nav-item"><a href="table_no.php" class="nav-link active">Table Number</a> </li>';
                                 
                                }
                            else
                                {                                        
                                        echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">My Orders</a> </li>';
                                        echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                                }
    
                            ?>
                       
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<div style=" background-image: url('images/img/pimg.jpg');">

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$table = $_POST['table'];  
	
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM table_number WHERE t_no='$table' "; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["table_no"] = $row['t_no']; 
										 header("refresh:1;url=index1.php"); 
	                            } 
							else
							    {
                                      	$message = "Invalid Table Number Enter Number Between 1 and 8"; 
                                }
	 }
	
	
}
?>
  

<div class="pen-title">
  <
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Enter Your Table Number</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="number" placeholder="Table Number"  name="table"/>
      
      <input type="submit" id="buttn" name="submit" value="Submit" />
    </form>
  </div>
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   
  <div class="container-fluid pt-3">
	<p></p>
  </div>


   
        <footer class="footer">
            <div class="container">

             
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Address</h5>
                            <p>Near D Mart, Rankala, Kolhapur</p>
                                    <h5>Phone: 9112348220</a></h5> </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Addition informations</h5>
                           <p>Join with our cafe to enjoy your time.</p>
                        </div>
                    </div>
                </div>
            
            </div>
        </footer>
       


</body>

</html>
