<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM students WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit;