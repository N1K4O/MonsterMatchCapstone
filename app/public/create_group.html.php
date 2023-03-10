<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Group</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <h1>Create a Group</h1>

    <form action="create_group.php" method="post" id="create_group" novalidate>
        <div>
            <label for="name">Group Name</label>
            <input type="text" id="group_name" name="group_name">
        </div>
        <p>You will be designated as the group leader upon creation</p>

        <button>Create</button>
    </form>

</body>

</html>