<?php
require_once '../../includes/auth.php';
require_once '../../includes/db.php';
require_once '../../includes/header.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p style='color:red;'>ID sản phẩm không hợp lệ.</p>";
    exit;
}

$id = intval($_GET['id']);

// Lấy thông tin sản phẩm
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "<p style='color:red;'>Không tìm thấy sản phẩm.</p>";
    exit;
}

// Xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = trim($_POST['name']);
    $gia = floatval($_POST['price']);
    $soLuong = intval($_POST['quantity']);

    if ($ten && $gia >= 0 && $soLuong >= 0) {
        try {
            $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, quantity = ? WHERE id = ?");
            $stmt->execute([$ten, $gia, $soLuong, $id]);
            header("Location: list.php");
            exit;
        } catch (PDOException $e) {
            $error = "Lỗi cập nhật: " . $e->getMessage();
        }
    } else {
        $error = "Vui lòng nhập đầy đủ và hợp lệ thông tin.";
    }
}
?>

<div class="container">
    <h2>✏️ Chỉnh sửa sản phẩm</h2>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <label>Tên sản phẩm:</label><br>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label>Giá (VNĐ):</label><br>
        <input type="number" name="price" step="1000" value="<?php echo $product['price']; ?>" required><br><br>

        <label>Số lượng:</label><br>
        <input type="number" name="quantity" min="0" value="<?php echo $product['quantity']; ?>" required><br><br>

        <button type="submit">Cập nhật</button>
        <a href="list.php">🔙 Quay lại</a>
    </form>
</div>

<?php require_once '../../includes/footer.php'; ?>
