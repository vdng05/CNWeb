<?php
$dsn = "mysql:host=localhost;dbname=students;charset=utf8mb4";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM students ORDER BY username ASC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$customHeaders = [
    "Mã sinh viên" => "username",
    "Mật khẩu"     => "password",
    "Họ"           => "lastname",
    "Tên"          => "firstname",
    "Lớp"          => "city",
    "Email"        => "email",
    "Khóa học"     => "course1"
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tài khoản (CSDL)</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2>Danh sách tài khoản đọc từ CSDL</h2>

<table>
    <thead>
        <tr>
            <?php foreach ($customHeaders as $label => $field): ?>
                <th><?= htmlspecialchars($label) ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($rows as $r): ?>
            <tr>
                <?php foreach ($customHeaders as $field): ?>
                    <td><?= htmlspecialchars($r[$field]) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
