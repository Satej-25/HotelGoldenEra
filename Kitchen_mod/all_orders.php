<?php
include("../connection/connect.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle order status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $order_id = intval($_POST['order_id']);
    $new_status = $_POST['status'];

    if (!empty($order_id) && in_array($new_status, ['in process', 'closed', 'rejected'])) {
        $stmt = mysqli_prepare($db, "UPDATE users_orders SET status=? WHERE o_id=?");
        mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // No redirect here because AJAX is used
        exit(); // important to prevent loading rest of the page
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <link rel="stylesheet" href="css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">All Orders</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Table Number</th>
                <th>Title</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="order-table-body">
    <!-- Orders will be loaded here -->
        </tbody>

    </table>
</div>
<script src="js/lib/jquery/jquery.min.js"></script>
<script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
<script>
function loadOrders() {
    $.ajax({
        url: "load_orders.php",
        type: "GET",
        success: function(data) {
            $("#order-table-body").html(data);
            attachStatusUpdateHandler(); // re-bind after reload
        },
        error: function() {
            console.error("Failed to load orders.");
        }
    });
}

// Attach change event to dropdowns
function attachStatusUpdateHandler() {
    $('.status-select').off('change').on('change', function() {
        const orderId = $(this).data('order-id');
        const newStatus = $(this).val();

        if (newStatus === "") return;

        $.ajax({
            url: "", // same page to handle POST
            type: "POST",
            data: {
                order_id: orderId,
                status: newStatus,
                update_status: 1
            },
            success: function() {
                console.log("Status updated");
            },
            error: function() {
                alert("Error updating status");
            }
        });
    });
}


loadOrders();
setInterval(loadOrders, 5000);
</script>


</body>
</html>