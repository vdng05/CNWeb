<?php
session_start();
require "db.php";

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $desc = $_POST["description"];
    $img = $_POST["image"];

    $stmt = $pdo->prepare("INSERT INTO flowers(name, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$name, $desc, $img]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoa mới</title>
</head>
<body>
<h2>Thêm hoa mới</h2>
<form method="POST">
    Tên hoa: <input type="text" name="name" required><br><br>
    Mô tả: <textarea name="description" required></textarea><br><br>
    Ảnh (đường dẫn): <input type="text" name="image" required><br><br>
    <button type="submit">Thêm</button>
</form>
<a href="index.php">Quay lại</a>
</body>
</html>
