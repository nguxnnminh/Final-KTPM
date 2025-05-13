<?php
require_once '../../includes/auth.php';    // Kiểm tra đăng nhập
require_once '../../includes/db.php';      // Kết nối CSDL
require_once '../../includes/header.php';  // Giao diện đầu trang

// Lấy danh sách sản phẩm từ database
try {
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>

<div class="container">
    <h2>📦 Danh sách sản phẩm</h2>

    <a href="add.php" style="text-decoration:none; background:#28a745; color:white; padding:6px 12px; border-radius:4px;">➕ Thêm sản phẩm</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:15px; width:100%; border-collapse:collapse;">
        <thead style="background:#f2f2f2;">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá (VNĐ)</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $product['id']; ?>">✏️ Sửa</a> |
                            <a href="delete.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">🗑️ Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align:center;">Không có sản phẩm nào.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once '../../includes/footer.php';
?>
