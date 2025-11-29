<?php
session_start();
require "db.php";

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true) {
    header("Location: login.html");
    exit;
}

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM flowers WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
