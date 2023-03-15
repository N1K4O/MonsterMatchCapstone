<?php
$host = "mysql";
$dbname = "monsterMatch";
$username = "root";
$password = "Jayhawks2023";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;