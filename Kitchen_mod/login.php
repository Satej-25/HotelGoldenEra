<?php
include("../connection/connect.php");
session_start();

$message = "";
$success = "";

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {
      $query = "SELECT * FROM admin WHERE username = ?";
      $stmt = mysqli_prepare($db, $query);
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
          // Secure password check
          if (password_verify($password, $row['password'])) {
              $_SESSION["adm_id"] = $row['adm_id'];
              header("Location: all_orders.php");
              exit();
          } else {
              $message = "Invalid Username or Password!";
          }
      } else {
          $message = "Invalid Username or Password!";
      }
  } else {
      $message = "All fields are required!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kitchen Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <div class="info">
      <h1>Kitchen Panel</h1>
    </div>
  </div>

  <div class="form">
    <div class="thumbnail"><img src="images/manager.png" alt="Manager Icon"/></div>
    
    <!-- Show messages -->
    <?php if (!empty($message)): ?>
      <span style="color:red;"><?php echo htmlspecialchars($message); ?></span>
    <?php endif; ?>
    
    <?php if (!empty($success)): ?>
      <span style="color:green;"><?php echo htmlspecialchars($success); ?></span>
    <?php endif; ?>

    <form class="login-form" action="" method="post">
      <input type="text" placeholder="Username" name="username" required />
      <input type="password" placeholder="Password" name="password" required />
      <input type="submit" name="submit" value="Login" />
    </form>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/index.js'></script>
</body>
</html>
