<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
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
    header("Location: signup-success.html");
    exit;
} catch (PDOException $e) {
    if ($e->errorInfo[1]) {
        echo "User already exists";
    } else {
        throw $e;
    }
}