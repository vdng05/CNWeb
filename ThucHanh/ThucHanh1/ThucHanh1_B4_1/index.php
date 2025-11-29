<?php
session_start();
require "db.php";

// Lấy danh sách hoa từ database
$stmt = $pdo->query("SELECT * FROM flowers");
$flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$is_admin = isset($_SESSION["admin"]) && $_SESSION["admin"] === true;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thực hành 1 - Nâng cấp dùng CSDL</title>
</head>
<body>

<?php if ($is_admin): ?>

    <h2>Chế độ quản trị</h2>
    <a href="logout.php">Đăng xuất</a>
    <br><br>

    <a href="addhoa.php">➕ Thêm hoa mới</a>
    <br><br>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Ảnh</th>
            <th>Tên hoa</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($flowers as $f): ?>
        <tr>
            <td><img src="<?= $f['image'] ?>" width="135"></td>
            <td><?= $f['name'] ?></td>
            <td><?= nl2br($f['description']) ?></td>
            <td>
                <a href="edithoa.php?id=<?= $f['id'] ?>">Sửa</a> |
                <a href="deletehoa.php?id=<?= $f['id'] ?>" onclick="return confirm('Xóa thật không?');">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>

    <h2>Bạn đang xem với tư cách khách</h2>
    <a href="login.html">Đăng nhập Admin</a>
    <br><br>

    <h1>Các loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>

    <?php foreach ($flowers as $f): ?>
        <div>
            <h3><?= $f['name'] ?></h3>
            <img src="<?= $f['image'] ?>" width="300">
            <p><?= nl2br($f['description']) ?></p>
            <hr>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

</body>
</html>
