<?php
    require_once "models/SinhVienModel.php";
    $host = "127.0.0.1";
    $dbname = "cse485_web";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    try
    {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected";
    }
    catch (PDOException $e)
    {
        echo "Connection failed : " . $e->getMessage();
    }

    if (isset($_POST["ten_sinh_vien"]) && isset($_POST["email"]))
    {
        $ten = $_POST["ten_sinh_vien"];
        $email = $_POST["email"];

        addSinhVien($pdo, $ten, $email);

        header("Location: index.php");
        exit;
    }
    $danh_sach_sv = getAllSinhVien($pdo);
    include "views/sinhvien_view.php";
?>