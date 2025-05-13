<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống bán hàng</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h2>Hệ thống quản lý bán hàng</h2>
        <nav>
            <a href="/dashboard.php">Trang chủ</a> |
            <a href="/logout.php">Đăng xuất</a>
        </nav>
        <hr>
    </header>
    <main>
