<?php
include("connection/connect.php");
session_start();

$stmt = $db->prepare("SELECT u.*, d.views
    FROM users_orders u
    JOIN dishes d ON u.title = d.title
    WHERE u.table_no = ?");
$stmt->bind_param("s", $_SESSION['table_no']);
$stmt->execute();
$query_res = $stmt->get_result();

if ($query_res->num_rows > 0) {
    while($row = $query_res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
        echo "<td>₹" . htmlspecialchars($row['price']) . "</td>";

        echo "<td>";
        $status = $row['status'];
        if($status == "" || $status == "NULL") {
            echo '<button class="btn btn-info"><span class="fa fa-bars"></span> Dispatch</button>';
        } elseif($status == "in process") {
            echo '<button class="btn btn-warning"><span class="fa fa-cog fa-spin"></span> In Process!</button>';
        } elseif($status == "closed") {
            echo '<button class="btn btn-success"><span class="fa fa-check-circle"></span> Delivered</button>';
        } elseif($status == "rejected") {
            echo '<button class="btn btn-danger"><i class="fa fa-close"></i> Cancelled</button>';
        }
        echo "</td>";

        echo "<td>" . htmlspecialchars($row['date']) . "</td>";

        echo "<td>";
        if($status == "" || $status == "NULL") {
            echo '<a href="delete_orders.php?order_del=' . $row['o_id'] . '" onclick="return confirm(\'Are you sure you want to cancel your order?\');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>';
        } else {
            echo '-';
        }
        echo "</td>";

        echo "<td>" . htmlspecialchars($_SESSION['table_no']) . "</td>";
        $videoFile = htmlspecialchars($row['views']);
    $videoId = 'video_' . uniqid(); // unique ID to target the element
    echo "<td>
    <a href='playvideo.php?file=$videoFile' target='_blank' style='text-decoration:none; color:blue;'>
        ▶ Play
    </span>
    <div id='$videoId'></div>
    </td>";
        echo "</tr>";
    }
} else {
    echo '<tr><td colspan="7" class="text-fetch_orders.phpcenter">You have No orders Placed yet.</td></tr>';
}
?>
