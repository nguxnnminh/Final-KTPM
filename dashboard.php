<?php
require_once 'includes/auth.php';
require_once 'includes/header.php';
?>

<h2>Chào mừng, <?php echo $_SESSION['user']['username']; ?>!</h2>
<p>Vai trò: <strong><?php echo $_SESSION['user']['role']; ?></strong></p>

<h3>Chức năng</h3>
<ul>
    <li><a href="modules/products/list.php">Quản lý sản phẩm</a></li>
    <li><a href="modules/orders/list.php">Quản lý đơn hàng</a></li>
    <li><a href="modules/customers/list.php">Khách hàng</a></li>

    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        <li><a href="modules/employees/list.php">Nhân viên</a></li>
        <li><a href="modules/suppliers/list.php">Nhà cung cấp</a></li>
    <?php endif; ?>

    <li><a href="modules/inventory/stock.php">Kho hàng</a></li>
    <li><a href="logout.php">Đăng xuất</a></li>
</ul>

<?php
require_once 'includes/footer.php';
?>
