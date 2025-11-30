<?php
    // TODO 1: (Cực kỳ quan trọng) Khởi động session
    session_start();

    $accounts = [
        "admin" => "123",
        "admin2" => "1234",
        "admin3" => "12345"
    ];

    // TODO 2: Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" (gửi form) chưa
    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        header("Location: login.html");
        exit;
    }

    // TODO 3: Nếu đã gửi form, lấy dữ liệu 'username' và 'password' từ $_POST
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // TODO 4: (Giả lập) Kiểm tra logic đăng nhập
    if ($accounts[$user] === $pass) {

        // TODO 5: Nếu thành công, lưu tên username vào SESSION
        $_SESSION["logged_acc"] = $user;

        // TODO 6: Chuyển hướng người dùng sang trang "chào mừng"
        header("Location: welcome.php");
        exit;
    } 
    else {
        header('Location: login.html?error=1'); 
        exit;
    }
    // TODO 7: Nếu người dùng truy cập trực tiếp file này (không qua POST),
    // "đá" họ về trang login.html
    // Gợi ý: Dùng else cho TODO 2 và cũng header() về login.html
?>