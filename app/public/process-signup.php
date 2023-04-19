<?php
header("Location: signup-success.html");
if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    echo "Password must be at least 8 characters";
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$pdo = require __DIR__ . "/database.php";

$query = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
try {
    $pdo->prepare($query)->execute([$_POST["name"], $_POST["email"], $password_hash]);
    $userID = $pdo->lastInsertID();
    $getGroup = "SELECT * from group_table WHERE group_id = {$_POST["group_id"]}";
    $result = $pdo->query($getGroup);
    $output = $result->fetch();
    $insertGroup = "INSERT INTO group_table (user_id, group_name, group_leader, group_id) VALUES (?, ?, ?, ?)";
    $pdo->prepare($insertGroup)->execute([$userID, $output["group_name"], "N", $_POST["group_id"]]);
    exit();
} catch (PDOException $e) {
    if ($e->errorInfo[1]) {
        echo "User already exists";
    } else {
        throw $e;
    }
}