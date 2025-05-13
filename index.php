<?php
session_start();

// Nếu chưa đăng nhập, hiển thị thông báo và chuyển trang sau 2 giây
if (!isset($_SESSION['user'])) {
    echo "Bạn chưa đăng nhập. Đang chuyển hướng đến trang đăng nhập...";
    header("refresh:2; url=login.php");
    exit;
}

// Nếu đã đăng nhập, hiển thị chào mừng và chuyển đến dashboard
echo "Xin chào, " . $_SESSION['user'] . "! Đang chuyển đến trang quản lý...";
header("refresh:2; url=dashboard.php");
exit;
?>
