<?php
include("connection/connect.php");
session_start();

if(empty($_SESSION['table_no'])) {
    header('location:table_no.php');
    exit();
}

$table_no = $_SESSION['table_no'];

// Prepare and delete all orders for this table number
$stmt = $db->prepare("DELETE FROM users_orders WHERE table_no = ?");
$stmt->bind_param("s", $table_no);

if($stmt->execute()) {
    // Deleted successfully
    unset($_SESSION['table_no']);
    unset($_SESSION["cart_item"]);
    header("Location: index.php?message=All Orders Cleared");
    exit();
} else {
    // Failed to delete
    header("Location: your_orders.php?error=Failed to Clear Orders");
    exit();
}
?>
