<?php session_start();

$pdo = require __DIR__ . "/database.php";
$user_id = $_SESSION["user_id"];
$query = "DELETE FROM `monsterMatch`.`group_table` WHERE (`user_id` = $user_id);";
try {
    $pdo->prepare($query)->execute();
    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    throw $e;
}