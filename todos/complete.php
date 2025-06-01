<?php
require '../config/db.php';
session_start();

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user_id']]);

header("Location: dashboard.php");
