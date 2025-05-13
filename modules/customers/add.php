<?php
require_once '../../includes/auth.php';

$customersFile = '../../data/customers.json';

if (!file_exists('../../data')) {
    mkdir('../../data', 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if ($name && $email && $phone) {
        $newCustomer = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ];

        $customers = [];

        if (file_exists($customersFile)) {
            $customers = json_decode(file_get_contents($customersFile), true);
        }

        $customers[] = $newCustomer;
        file_put_contents($customersFile, json_encode($customers, JSON_PRETTY_PRINT));

        header('Location: list.php');
        exit;
    } else {
        $error = "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm khách hàng</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Thêm khách hàng</h2>
    <form method="post">
        <label>Họ và tên:</label><br>
        <input type="text" name="name" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Số điện thoại:</label><br>
        <input type="text" name="phone" required><br><br>

        <button type="submit">Lưu</button>
        <a href="list.php">Quay lại</a>

        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    </form>
</body>
</html>