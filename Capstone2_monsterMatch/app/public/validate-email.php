<?php

$mysqli = require __DIR__ . "/database.php";

/*
$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));
                */
$sql = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
$sql->execute([$_GET["email"]]);               
$result = $sql->fetch();
echo $result->num_rows;
$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);