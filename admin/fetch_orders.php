<?php
include("../connection/connect.php");

$sql = "SELECT table_number.*, users_orders.* FROM users_orders 
        INNER JOIN table_number ON table_number.t_no = users_orders.table_no";
$query = mysqli_query($db, $sql);

$data = [];
while ($rows = mysqli_fetch_assoc($query)) {
    $data[] = $rows;
}

echo json_encode($data);
?>
