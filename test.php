<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Hello from PHP!<br>";

$pdo = new PDO("mysql:host=localhost;dbname=todo_app", "root", "");
echo "Connected to DB!";
