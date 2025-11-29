<?php
    session_start();
    $admin_accs = [
        "admin" => "123",
        "admin2" => "1234",
        "admin3" => "12345"
    ];

    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        header("Location: login.html");
        exit;
    }

    $user = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $admin_mode = false;

    if (isset($admin_accs[$user]) && $admin_accs[$user] === $password) {
        $_SESSION["admin"] = true;
        header("Location: index.php");
        exit;
    }
    else
    {
        echo "<h3>Sai tài khoản hoặc mật khẩu</h3>";
    }
?>