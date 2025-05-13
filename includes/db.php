<?php
// Thông tin kết nối
$host = 'localhost';
$dbname = 'sales_management'; // Đặt đúng tên database bạn tạo
$username = 'root';
$password = ''; // Nếu bạn dùng XAMPP thì mặc định rỗng

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Thiết lập chế độ báo lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối CSDL thất bại: " . $e->getMessage());
}
?>
