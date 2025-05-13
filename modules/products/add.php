<?php
require_once '../../includes/auth.php';
require_once '../../includes/db.php';
require_once '../../includes/header.php';

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = trim($_POST['name']);
    $gia = floatval($_POST['price']);
    $soLuong = intval($_POST['quantity']);

    // Kiểm tra dữ liệu hợp lệ
    if ($ten && $gia >= 0 && $soLuong >= 0) {
        try {
            $stmt = $pdo->prepare("INSERT INTO products (name, price, quantity) VALUES (?, ?, ?)");
            $stmt->execute([$ten, $gia, $soLuong]);
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Lỗi thêm sản phẩm: " . $e->getMessage();
        }
    } else {
        $error = "Vui lòng nhập đầy đủ và hợp lệ thông tin.";
    }
}
?>

<div class="container">
    <h2>➕ Thêm sản phẩm mới</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Giá (VNĐ):</label><br>
        <input type="number" name="price" step="1000" required><br><br>

        <label>Số lượng:</label><br>
        <input type="number" name="quantity" min="0" required><br><br>

        <button type="submit">Lưu</button>
        <a href="list.php">Quay lại</a>
    </form>
</div>

<?php
require_once '../../includes/footer.php';
?>
