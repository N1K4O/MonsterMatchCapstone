<?php
session_start();
$user_id = $_SESSION["user_id"];
$int = (int) $user_id;
$user_name = $_SESSION["user_name"];
$id = $_POST["group_id"];
$pdo = require __DIR__ . "/database.php";
$query_name = "SELECT * from group_table WHERE group_id = $id";
$query = "INSERT INTO group_table (user_id, group_name, group_leader, group_id, group_leader_name) VALUES (?, ?, ?, ?, ?)";

try {
    $result = $pdo->query($query_name);
    $group_data = $result->fetch();
    $pdo->prepare($query)->execute([$int, $group_data['group_name'], "N", $id, $group_data['group_leader_name']]);
    header("Location: index.php");
    exit();

    //echo '<script>window.location.reload()</script>';
} catch (PDOException $e) {
    throw $e;
}
?>