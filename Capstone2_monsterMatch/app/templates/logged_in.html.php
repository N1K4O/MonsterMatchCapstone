<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Form Example</title>
</head>

<body>
    <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
    <p>Your ID is <?= htmlspecialchars($user["id"]) ?></p>
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
            //echo $_POST["monster"];
            include __DIR__ . "/../public/create_character.php";
            /*
            $pdo = require __DIR__ . "/../public/database.php";
            $query = "INSERT INTO characters (user_id, character_name) VALUES (?, ?)";
            $pdo->prepare($query)->execute([$user["id"], $_POST["monster"]]);
            header("Refresh:0");
            */
        }
    endif; ?>
</body>

</html>