<?php
session_start();
$is_valid = false;
$user_id = $_SESSION["user_id"];
$int = (int) $user_id;
$user_name = $_SESSION["user_name"];
$id = $_POST["group_id"];
$pdo = require __DIR__ . "/database.php";

$group_count = array();
$group_members = "SELECT user_id FROM group_table WHERE group_id = $id";
$result4 = $pdo->query($group_members);
$member_out = $result4->fetchAll();
foreach ($member_out as $member) {
    array_push($group_count, json_encode(($member["user_id"])));
}

if(count($group_count) < 6){
$query_name = "SELECT * from group_table WHERE group_id = $id";
$query = "INSERT INTO group_table (user_id, group_name, group_leader, group_id, group_leader_name) VALUES (?, ?, ?, ?, ?)";

try { //
    $result = $pdo->query($query_name);
    $group_data = $result->fetch();
    $pdo->prepare($query)->execute([$int, $group_data['group_name'], "N", $id, $group_data['group_leader_name']]);
    header("Location: index.php");
    $is_valid = true;
    exit();

    //echo '<script>window.location.reload()</script>';
} catch (PDOException $e) {
    throw $e;
}
} else {
    ?>
    <em>
        <div class="text-center">
            <h6>Invalid email or password</h6>
            </div><br>
    </em>
    <?

}
?>