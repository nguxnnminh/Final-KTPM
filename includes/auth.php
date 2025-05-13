<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Hàm kiểm tra quyền truy cập
function require_role($requiredRole) {
    if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $requiredRole) {
        echo "<h3 style='color:red;'>Bạn không có quyền truy cập trang này.</h3>";
        echo "<p><a href='dashboard.php'>Quay lại trang chính</a></p>";
        exit;
    }
}

// Hàm kiểm tra có một trong nhiều quyền
function require_any_role(array $roles) {
    if (!isset($_SESSION['user']['role']) || !in_array($_SESSION['user']['role'], $roles)) {
        echo "<h3 style='color:red;'>Bạn không có quyền truy cập chức năng này.</h3>";
        echo "<p><a href='dashboard.php'>Quay lại trang chính</a></p>";
        exit;
    }
}
?>
