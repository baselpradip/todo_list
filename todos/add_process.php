<?php
require '../config/db.php';
session_start();

$task = $_POST['task'];
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("INSERT INTO todos (user_id, task, created_at) VALUES (?, ?, UTC_TIMESTAMP())");
$stmt->execute([$user_id, $task]);

header("Location: dashboard.php");
