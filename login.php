<?php
session_start();

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenDangNhap = $_POST['username'];
    $matKhau = $_POST['password'];

    // Danh sách tài khoản mẫu
    $taiKhoanMau = [
        'admin' => ['password' => '123', 'role' => 'admin'],
        'staff1' => ['password' => '456', 'role' => 'staff'],
        'employee1' => ['password' => '789', 'role' => 'employee'],
    ];

    // Kiểm tra tài khoản và mật khẩu
    if (isset($taiKhoanMau[$tenDangNhap]) && $matKhau === $taiKhoanMau[$tenDangNhap]['password']) {
        // Gán session
        $_SESSION['user'] = [
            'username' => $tenDangNhap,
            'role' => $taiKhoanMau[$tenDangNhap]['role']
        ];
        header('Location: dashboard.php');
        exit;
    } else {
        $loi = "Tên đăng nhập hoặc mật khẩu không đúng!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>Đăng nhập hệ thống bán hàng</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br>
        <button type="submit">Đăng nhập</button><br>
        <?php if (isset($loi)) echo "<p style='color:red;'>$loi</p>"; ?>
    </form>
</body>
</html>
