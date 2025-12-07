<?php
    function getAllSinhVien($pdo)
    {
        $sql = "Select * from sinhvien";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function addSinhVien($pdo, $ten, $email)
    {
        $sql = "Insert into sinhvien (ten_sinh_vien, email) values (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$ten, $email]);
    }
?>