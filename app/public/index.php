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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - MonsterMash</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800&amp;display=swap">
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
    <? include __DIR__ . '/navbar.html.php'; ?>
    <header class="bg-dark">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-2 fw-bold text-center">Welcome to <span  style="color: rgb(4, 188, 44); font-family:Denk One">Monster</span><span style="color: rgb(239, 115, 0);font-family:Denk One">Match</span></h1>
                    </div>
                    <?php if (isset($user)) :
                        $user_id = $user["id"];
                        $get_char = "SELECT * FROM characters WHERE user_id = $user_id";
                        $result2 = $mysqli->query($get_char);
                        $out = $result2->fetch();

                        $get_group = "SELECT * FROM group_table WHERE user_id = $user_id";
                        $result3 = $mysqli->query($get_group);
                        $group_out = $result3->fetch();
                        //$group_id = $group_out["group_id"];
                        /*
                        $group_members = "SELECT user_id FROM group_table WHERE group_id = $group_id";
                        $result4 = $mysqli->prepare($group_members);
                        $result4->execute();
                        $member_out = $result4->fetch(PDO::FETCH_ASSOC);
                        */

                        include __DIR__ . '/logged_in.html.php';
                    ?>
                </div>
            <?
                    else : ?>
                <section class="py-5">
                    <!--<div class="container py-5">-->
                    <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded swing animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Jason.512.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded bounce animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/Ghostface-icon.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded pulse animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/icons8-angel-96.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded jello animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Casper.512.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded tada animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Grim-Reaper.512.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="text-center"><img class="rounded rubberBand animated infinite mb-3 fit-cover" width="150" height="150" src="assets/img/products/Hopstarter-Halloween-Avatar-Fatso.512.png">
                                <h5 class="fw-bold mb-0"><strong></strong></h5>
                                <p class="text-muted mb-2"></p>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
                </section>
            </div>
        </div>
        </div>
    </header>

    <section class="py-5 mt-5">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Testimonials</p>
                    <h2 class="fw-bold"><strong>What People Say About us</strong></h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">An amazing party game! Very fun!</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/team/avatar2.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">John Smith</p>
                                <p class="text-muted mb-0">Kansas City</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">Well worth the time to get together with friends and learn how to play!</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/team/avatar4.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">Jack Johnson</p>
                                <p class="text-muted mb-0">New York</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-dark border rounded border-dark p-4">If you like fun, this game if for you!</p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="assets/img/team/avatar5.jpg">
                            <div>
                                <p class="fw-bold text-primary mb-0">Janet Smith</p>
                                <p class="text-muted mb-0">Chicago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php endif ?>

<? include __DIR__ . '/footer.html'; ?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/bold-and-dark.js"></script>

</body>

</html>