<?php {
    $pdo = require __DIR__ . "/database.php";
    $query = "INSERT INTO characters (user_id, character_name) VALUES (?, ?)";
    try {
        $pdo->prepare($query)->execute([$user["id"], $_POST["monster"]]);
        echo '<script>window.location="/monster_created.html"</script>';
        exit();
    } catch (PDOException $e) {
        throw $e;
    }
}
?>