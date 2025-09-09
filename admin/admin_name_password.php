<?php
include("../connection/connect.php");

// Test values (you can replace them with $_POST inputs later)
$username = "Atharv";
$password = "Atharv75";
$email = "atharvsangale75@gmail.com";

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL insert
$sql = "INSERT INTO admin (username, password,email) VALUES (?, ?,?)";
$stmt = mysqli_prepare($db, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword,$email);
    if (mysqli_stmt_execute($stmt)) {
        echo "User inserted successfully!";
    } else {
        echo "Execute failed: " . mysqli_stmt_error($stmt);
    }
} else {
    echo "Prepare failed: " . mysqli_error($db);
}
?>

