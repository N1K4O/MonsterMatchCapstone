<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <h1>Home</h1>

    <?php if (isset($user)):
        $user_id = $user["id"];
        $get_char = "SELECT * FROM characters WHERE user_id = $user_id";
        $result2 = $mysqli->query($get_char);
        $out = $result2->fetch();

        $get_group = "SELECT * FROM group_table WHERE user_id = $user_id";
        $result3 = $mysqli->query($get_group);
        $group_out = $result3->fetch();
        include __DIR__ . '/../templates/logged_in.html.php';
        ?>
        <p><a href="logout.php">Log out</a></p>
    <?php else: ?>
        <p><a href="login.php">Log in</a> <br> <a href="signup.html.php">Create ID</a></p>
    <?php endif; ?>

</body>

</html>