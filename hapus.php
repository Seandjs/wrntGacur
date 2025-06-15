<?php
$pdo = require 'koneksi.php';

if (!isset($_GET['id'])) {
    header('Location: usermanage.php');
    exit;
}

$id = $_GET['id'];

if (!is_numeric($id)) {
    header('Location: usermanage.php');
    exit;
}

$sql = "SELECT * FROM wrntuser WHERE id = :id";
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);
$wrntuser = $query->fetch();

if (!$wrntuser) {
    header('Location: usermanage.php');
    exit;
}

$sql2 = "DELETE FROM wrntuser WHERE id = :id";
$query2 = $pdo->prepare($sql2);
$query2->execute(['id' => $id]);

header('Location: usermanage.php');
exit;
?>