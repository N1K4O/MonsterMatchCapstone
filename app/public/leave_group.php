<?php session_start();

$pdo = require __DIR__ . "/database.php";
$user_id = $_SESSION["user_id"];
$query = "DELETE FROM `monsterMatch`.`group_table` WHERE (`user_id` = $user_id);";
$query2 = "DELETE FROM `monsterMatch`.`characters` WHERE (`user_id` = $user_id);";
try {
    $pdo->prepare($query)->execute();
    $pdo->prepare($query2)->execute();
    header("Location: index.php");
    exit();
} catch (PDOException $e) {
    throw $e;
}