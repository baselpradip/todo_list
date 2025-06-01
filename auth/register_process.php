<?php
require '../config/db.php';
session_start();

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

$_SESSION['user_id'] = $pdo->lastInsertId();
header("Location: ../todos/dashboard.php");
