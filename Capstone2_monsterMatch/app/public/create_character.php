<!DOCTYPE html>
<html lang="en">
<?php
$pdo = require __DIR__ . "/database.php";

echo $_POST["monster"];
echo htmlspecialchars($user["id"]);

$pdo = require __DIR__ . "/../public/database.php";
            $query = "INSERT INTO characters (user_id, character_name) VALUES (?, ?)";
            $pdo->prepare($query)->execute([$user["id"], $_POST["monster"]]);
            header("Location: index.php");
?>
</html>
