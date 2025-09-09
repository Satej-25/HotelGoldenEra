<?php
include("../connection/connect.php");

$sql = "SELECT * FROM users_orders ORDER BY table_no, date DESC";
$result = mysqli_query($db, $sql);

$current_table = null;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($current_table !== $row['table_no']) {
            $current_table = $row['table_no'];
            echo "<tr><td colspan='7' style='background:#f0f0f0; font-weight:bold;'>Table No: {$current_table}</td></tr>";
        }
        ?>
        <tr>
            <td><?= htmlspecialchars($row['table_no']) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['quantity']) ?></td>
            <td>₹<?= htmlspecialchars($row['price']) ?></td>
            <td>
                <form method="POST" class="update-form">
                    <input type="hidden" name="order_id" value="<?= $row['o_id'] ?>">
                    <select name="status" class="form-control status-select" data-order-id="<?= $row['o_id'] ?>">
                        <option value="">Select</option>
                        <option value="in process" <?= $row['status'] == 'in process' ? 'selected' : '' ?>>On the Way</option>
                        <option value="closed" <?= $row['status'] == 'closed' ? 'selected' : '' ?>>Delivered</option>
                        <option value="rejected" <?= $row['status'] == 'rejected' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                    <input type="hidden" name="update_status" value="1">
                </form>
            </td>
            <td><?= date("d M Y h:i A", strtotime($row['date'])) ?></td>
            <td>
                <a href="delete_orders.php?order_del=<?= $row['o_id'] ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="8" class="text-center">No Orders Found</td></tr>';
}
?>
