<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Form Example</title>
</head>

<body>

    <section class="py-5">
        <div class="text-center">
            <h4 class="fw-bold mb-0">Hello <strong><?= htmlspecialchars($user["name"]) ?></strong></h4><br>
            <div class="text-center">
                <p>Your ID is
                    <?= htmlspecialchars($user["id"]) ?>
                </p>
                <?
                if ($group_out) {
                    $ghost = false;
                    $grim = false;
                    $murderer = false;
                    $lost_soul_1 = false;
                    $lost_soul_2 = false;
                    $angel = false;
                    $group_characters = array();
                    $group_id = $group_out["group_id"];
                    $group_members = "SELECT user_id FROM group_table WHERE group_id = $group_id";
                    $result4 = $mysqli->query($group_members);
                    $member_out = $result4->fetchAll();
                ?>
                    <p>Your Group ID is
                        <?= htmlspecialchars($group_out["group_id"]) ?>
                    </p>
                    <p>Your Group Name is
                        <?= htmlspecialchars($group_out["group_name"]) ?>
                    </p>
                <?
                }
                if ($group_out && !$out && $group_out["user_id"] == $user["id"] && $group_out["group_leader"] == "Y") : ?>
                    <p>You are the Group Leader AKA The Crypt Keeper</p>
                    <br>
                    <?
                    foreach ($member_out as $member) {
                        $member_id = json_encode($member["user_id"]) . PHP_EOL;
                        $char_query = "SELECT character_name, user_id FROM characters WHERE user_id = $member_id";
                        $char_result = $mysqli->query($char_query);
                        $char_out = $char_result->fetchAll();

                        foreach ($char_out as $char) {
                            $char_user = $char["user_id"];
                            $user_query = "SELECT * FROM user WHERE id = $char_user";
                            $user_result = $mysqli->query($user_query);
                            $user_out = $user_result->fetch();

                            array_push($group_characters, json_encode($char["character_name"]), $user_out["name"]);
                        }
                    }
                    if (count($group_characters) > 0) : ?>
                        <h4 class="fw-bold mb-0"><br><span style="color: rgb(4, 188, 44)"><strong>Characters Taken Are:</strong></span></h4><br>
                        <?
                        for ($i = 0; $i < count($group_characters); $i += 2) {
                            echo $group_characters[$i] . " - " . $group_characters[$i + 1] . "<br>";
                        }
                        ?>
                        <br><br>
                        <a class="btn btn-outline-secondary shadow" role="button" href="how_to_play copy.html">How To Play</a>
                        <a class="btn btn-outline-secondary shadow" role="button" href="trivia.html">Trivia Questions</a>
                        
                    <? endif ?>
                    <section class="py-5">
                        <div class="text-center">
                            <?
                            include __DIR__ . '/crypt_desc.html';
                            ?>
                            <br><br>
                        </div>
                    </section>
                <? endif ?>

                <? if ($group_out && $group_out["group_leader"] == "N" && !$out) : ?>
                    <? foreach ($member_out as $member) {
                        $member_id = json_encode($member["user_id"]) . PHP_EOL;
                        $char_query = "SELECT character_name, user_id FROM characters WHERE user_id = $member_id";
                        $char_result = $mysqli->query($char_query);
                        $char_out = $char_result->fetchAll();

                        foreach ($char_out as $char) {
                            $char_user = $char["user_id"];
                            $user_query = "SELECT * FROM user WHERE id = $char_user";
                            $user_result = $mysqli->query($user_query);
                            $user_out = $user_result->fetch();

                            foreach ($char_out as $char) {
                                array_push($group_characters, json_encode($char["character_name"]));
                                //$group_characters = json_encode($char["character_name"]);
                                if ($char["character_name"] == "Ghost") {
                                    $ghost = true;
                                } elseif ($char["character_name"] == "Grim Reaper") {
                                    $grim = true;
                                } elseif ($char["character_name"] == "Murderer") {
                                    $murderer = true;
                                } elseif ($char["character_name"] == "Lost Soul") {
                                    $lost_soul_1 = true;
                                } elseif ($char["character_name"] == "Lost Soul 2") {
                                    $lost_soul_2 = true;
                                } elseif ($char["character_name"] == "Angel") {
                                    $angel = true;
                                }
                            }
                        }
                    }
                    ?>

                    <p>Your Group Leader is
                        <?= htmlspecialchars($group_out["group_leader_name"]) ?>
                    </p>
                    <form action="" method="post" id="select" novalidate>
                        <fieldset>
                            <section class="py-4">
                                <legend style="font-family:Denk One; font-size: 40px">Select Your Character</legend>
                                <div class="container py-5">
                                    <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 800px;">
                                        <? if ($murderer == false) : ?>
                                            <div class="col mb-2">
                                                <div class="text-center">
                                                    <input type="radio" id="murderer" name="monster" value="Murderer">
                                                    <label for="murderer">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Jason.512.png">Murderer</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <? if ($angel == false) : ?>
                                            <div class="col mb-4">
                                                <div class="text-center">
                                                    <input type="radio" id="angel" name="monster" value="Angel" />
                                                    <label for="angel">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Angel-595b40b65ba036ed117d3b6a.svg" />Angel</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <? if ($ghost == false) : ?>
                                            <div class="col mb-2">
                                                <div class="text-center">
                                                    <input type="radio" id="ghost" name="monster" value="Ghost" />
                                                    <label for="ghost">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Ghostface-icon.png">Ghost</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <? if ($lost_soul_1 == false) : ?>
                                            <div class="col mb-4">
                                                <div class="text-center">
                                                    <input type="radio" id="lost_soul_1" name="monster" value="Lost Soul" />
                                                    <label for="lost_soul_1">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Casper.512.png">Lost Soul</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <? if ($grim == false) : ?>
                                            <div class="col mb-4">
                                                <div class="text-center">
                                                    <input type="radio" id="grim_reaper" name="monster" value="Grim Reaper" />
                                                    <label for="grim_reaper">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Grim-Reaper.512.png" />Grim Reaper</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                        <? if ($lost_soul_2 == false) : ?>
                                            <div class="col mb-4">
                                                <div class="text-center">
                                                    <input type="radio" id="lost_soul_2" name="monster" value="Lost Soul 2">
                                                    <label for="lost_soul_2">
                                                        <img class="rounded mb-6 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Fatso.512.png">Lost Soul</label>
                                                </div>
                                            </div>
                                        <? endif ?>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary shadow" role="button">Submit</button>
                            </section>
                        </fieldset>
                    </form>
                    <?php if (isset($_POST["monster"])) {
                        include __DIR__ . "/../public/create_character.php";
                    }

                    ?>
                <? endif ?>

            </div>
            <? $leader = "N" ?>


            <? if ($out) : ?>
                <p>Your Group Leader is
                    <?= htmlspecialchars($group_out["group_leader_name"]) ?>
                </p>
                <img class="rounded mb-3 fit-cover" width="150" height="150" <? if (htmlspecialchars($out["character_name"]) == 'Grim Reaper') : ?> src="assets/img/products/Hopstarter-Halloween-Avatar-Grim-Reaper.512.png">
                <em>
                    <?
                                                                                    include __DIR__ . '/grim_description.html';
                    ?>
        </div><br>
        </em> <? elseif (htmlspecialchars($out["character_name"]) == 'Murderer') : ?> src="assets/img/products/Hopstarter-Halloween-Avatar-Jason.512.png"
        <em>
            <?
                                                                                    include __DIR__ . '/murder_description.html';
            ?>
            </div><br>
        </em> <? elseif (htmlspecialchars($out["character_name"]) == 'Ghost') : ?> src="assets/img/products/Ghostface-icon.png"
        <em>

            <?
                                                                                    include __DIR__ . '/ghost_description.html';
            ?>

            </div><br>
        </em> <? elseif (htmlspecialchars($out["character_name"]) == 'Lost Soul') : ?> src="assets/img/products/Hopstarter-Halloween-Avatar-Casper.512.png"
        <em>
            <?
                                                                                    include __DIR__ . '/lost1_description.html';
            ?>
            </div><br>
        </em> <? elseif (htmlspecialchars($out["character_name"]) == 'Lost Soul 2') : ?> src="assets/img/products/Hopstarter-Halloween-Avatar-Fatso.512.png"
        <em>
            <?
                                                                                    include __DIR__ . '/lost2_description.html';
            ?>
            </div><br>
        </em> <? elseif (htmlspecialchars($out["character_name"]) == 'Angel') : ?> src="assets/img/products/Angel-595b40b65ba036ed117d3b6a.svg">
        <em>
            <?
                                                                                    include __DIR__ . '/angel_description.html';
            ?>
            <br>
        </em>
    <? endif ?>
<? endif ?>
<br>

<div class="text-center">
    <?php if (!($group_out)) {
        noGroup();
    } elseif ($group_out) {
        leaveGroup();
    }
    ?>
</div>
    </section>
    <?php
    function noGroup()
    {
    ?>
        <a class="btn btn-outline-warning shadow" role="button" href="create_group.html.php">Create A Group</a>
        <a class="btn btn-outline-warning shadow" role="button" href="join_group.html.php">Join A Group</a>
    <?
    }

    function leaveGroup()
    {
    ?>
        <a class="btn btn-outline-danger shadow" role="button" href="leave_group.php">Leave Group</a>
    <?

    }
    ?>
</body>

</html>