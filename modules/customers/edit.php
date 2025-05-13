<?php
require_once '../../includes/auth.php';

$dataFile = _DIR_ . '/../../data/customers.json';

// Đọc dữ liệu từ file JSON
$customers = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Kiểm tra có truyền ID qua GET không
if (!isset($_GET['id']) || !isset($customers[$_GET['id']])) {
    echo "Khách hàng không tồn tại.";
    exit;
}

$id = $_GET['id'];
$customer = $customers[$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';

    // Cập nhật thông tin khách hàng
    $customers[$id] = [
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
    ];

    file_put_contents($dataFile, json_encode($customers, JSON_PRETTY_PRINT));
    header('Location: list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa khách hàng</title>
</head>
<body>
    <h2>Sửa thông tin khách hàng</h2>
    <form method="post">
        <label>Họ tên: <input type="text" name="name" value="<?= htmlspecialchars($customer['name']) ?>" required></label><br><br>
        <label>Số điện thoại: <input type="text" name="phone" value="<?= htmlspecialchars($customer['phone']) ?>" required></label><br><br>
        <label>Email: <input type="email" name="email" value="<?= htmlspecialchars($customer['email']) ?>" required></label><br><br>
        <button type="submit">Lưu thay đổi</button>
        <a href="list.php">Quay lại</a>
    </form>
</body>
</html>