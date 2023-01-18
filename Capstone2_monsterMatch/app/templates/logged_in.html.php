<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Form Example</title>
</head>

<body>
    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
    <p>Your ID is <?= htmlspecialchars($user["id"]) ?></p>
    <?php if ($group_out): ?>
        <p>Your Group ID is <?= htmlspecialchars($group_out["group_id"]) ?> </p>
        <p>Your Group Name is <?= htmlspecialchars($group_out["group_name"]) ?> </p>
    <?php endif ?>
    <?php if ($group_out && $group_out["user_id"] == $user["id"] && $group_out["group_leader"] == $user["name"]): ?>
        <p>You are the Group Leader</p>
    <?php elseif ($group_out): ?>
        <p>Your Group Leader is <?= htmlspecialchars($group_out["group_leader"]) ?> </p>
    <?php endif ?>

    <?php if ($out): ?>
        <p> Your Character is <?= htmlspecialchars($out["character_name"]) ?> </p>
    <?php else: ?>
        <form action="" method="post" id="select" novalidate>
            <fieldset>
                <legend>Select Your Monster</legend>
                <input type="radio" id="Vampire" name="monster" value="Vampire">
                <label for="vampire">Vampire</label><br>
                <input type="radio" id="zombie" name="monster" value="Zombie">
                <label for="zombie">Zombie</label><br>
                <input type="radio" id="witch" name="monster" value="Witch">
                <label for="witch">Witch</label>
                <br>
                <button>Submit</button>
            </fieldset>
        </form>
        <?php if (isset($_POST["monster"])) {
            include __DIR__ . "/../public/create_character.php";
        }
    endif; ?>
    <?php if (!($group_out)): ?>
        <p><a href="create_group.html.php">Create a Group</a></p>
    <?php endif ?>

</body>

</html>