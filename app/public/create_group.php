<?php
session_start();
$user_id = $_SESSION["user_id"];
$int = (int) $user_id;
$user_name = $_SESSION["user_name"];
$id = rand(1, 100);
$pdo = require __DIR__ . "/database.php";
$query = "INSERT INTO group_table (user_id, group_name, group_leader, group_id, group_leader_name) VALUES (?, ?, ?, ?, ?)";

try {
    $pdo->prepare($query)->execute([$int, $_POST["group_name"], "Y", $id, $user_name]);
    header("Location: index.php");
    exit();

    //echo '<script>window.location.reload()</script>';
} catch (PDOException $e) {
    throw $e;
}
?>