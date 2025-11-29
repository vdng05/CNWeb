<?php
// File CSV cần đọc
$csvFile = "65HTTT_Danh_sach_diem_danh.csv";

if (!file_exists($csvFile)) {
    die("Không tìm thấy file CSV: $csvFile");
}

$handle = fopen($csvFile, "r");

$rows = [];
$headers = [];

// Tiêu đề mà bạn muốn hiển thị
$customHeaders = [
    "Mã sinh viên",
    "Mật khẩu",
    "Họ",
    "Tên",
    "Lớp",
    "Email",
    "Khóa học"
];

if ($handle !== false) {

    // Bỏ qua dòng tiêu đề gốc trong file CSV
    $originalHeader = fgetcsv($handle);

    // Đọc dữ liệu
    while (($data = fgetcsv($handle)) !== false) {
        $rows[] = $data;
    }

    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tài khoản (CSV)</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2>Danh sách tài khoản đọc từ CSV</h2>

<table>
    <thead>
        <tr>
            <?php foreach ($customHeaders as $h): ?>
                <th><?= $h ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($rows as $r): ?>
            <tr>
                <?php foreach ($r as $cell): ?>
                    <td><?= htmlspecialchars($cell) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
