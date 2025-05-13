<?php
require_once '../../includes/auth.php';

$customersFile = '../../data/customers.json';
$customers = [];

if (file_exists($customersFile)) {
    $customers = json_decode(file_get_contents($customersFile), true);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách khách hàng</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Danh sách khách hàng</h2>
    <a href="add.php">+ Thêm khách hàng</a> | <a href="../../dashboard.php">Trang chính</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>SĐT</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($customers)): ?>
                <tr><td colspan="4">Chưa có khách hàng.</td></tr>
            <?php else: ?>
                <?php foreach ($customers as $index => $customer): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($customer['name']) ?></td>
                        <td><?= htmlspecialchars($customer['email']) ?></td>
                        <td><?= htmlspecialchars($customer['phone']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>