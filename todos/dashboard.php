<?php
session_start();
require '../config/db.php';
require '../includes/header.php';

echo "<h2>Your Tasks</h2>";

$stmt = $pdo->prepare("SELECT * FROM todos WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$todos = $stmt->fetchAll();

foreach ($todos as $todo) {
    $utcTime = new DateTime($todo['created_at'], new DateTimeZone('UTC'));
    $utcTime->setTimezone(new DateTimeZone('Asia/Kathmandu'));
    $localTime = $utcTime->format('Y-m-d H:i');

    echo "<div class='task'>
        <strong>{$todo['task']}</strong> - <em>{$localTime}</em><br>
        <a href='complete.php?id={$todo['id']}'>Mark as Done</a> |
        <a href='delete.php?id={$todo['id']}'>Delete</a>
    </div>";
}

echo "<a href='add.php'><button>Add New Task</button></a>";
echo "</div>";
