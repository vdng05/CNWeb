<?php
session_start();
require "db.php";

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: login.html");
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) exit("ID không hợp lệ");

// Lấy dữ liệu hoa
$stmt = $pdo->prepare("SELECT * FROM flowers WHERE id = ?");
$stmt->execute([$id]);
$flower = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$flower) exit("Không tìm thấy hoa");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $img = $_POST["image"];

    $stmt = $pdo->prepare("UPDATE flowers SET name=?, description=?, image=? WHERE id=?");
    $stmt->execute([$name, $desc, $img, $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa hoa</title>
</head>
<body>
<h2>Sửa hoa</h2>
<form method="POST">
    Tên hoa: <input type="text" name="name" value="<?= $flower['name'] ?>" required><br><br>
    Mô tả: <textarea name="description" required><?= $flower['description'] ?></textarea><br><br>
    Ảnh (đường dẫn): <input type="text" name="image" value="<?= $flower['image'] ?>" required><br><br>
    <button type="submit">Lưu</button>
</form>
<a href="index.php">Quay lại</a>
</body>
</html>
