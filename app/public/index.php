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
    <title>Home - Monster Mash</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800&amp;display=swap">
</head>

<body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
    <nav id="mainNav" class="navbar navbar-dark navbar-expand-md sticky-top border-secondary shadow navbar-shrink py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span
                    class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg
                        class="bi bi-bezier" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z">
                        </path>
                        <path
                            d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z">
                        </path>
                    </svg></span><span>Monster Match</span></a><button class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div id="navcol-2" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <!--
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacts.html">Contacts</a></li>
                </ul>
                <a class="btn btn-outline-warning shadow" role="button" href="signup.html.php">Sign up</a>
                <a class="btn btn-outline-warning" role="button" href="login.html.php">Login</a>
                -->
                <?php if (!isset($user)): ?>
                    <a class="btn btn-outline-warning" role="button" href="login.html.php">Login</a> <a
                        class="btn btn-outline-warning shadow" role="button" href="signup.html.php">Sign up</a>
                <?php else: ?>
                    <a class="btn btn-outline-warning" role="button" href="logout.php">Log Out</a>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-dark">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="display-2 fw-bold text-center">Welcome to <span
                                style="color: rgb(4, 188, 44); background-color: rgb(46, 38, 38);">Monster</span><span
                                style="background-color: rgb(46, 38, 38);"> </span><span
                                style="color: rgb(239, 115, 0); background-color: rgb(46, 38, 38);">Match</span></h1>
                    </div>
                    <?php if (isset($user)):
                        $user_id = $user["id"];
                        $get_char = "SELECT * FROM characters WHERE user_id = $user_id";
                        $result2 = $mysqli->query($get_char);
                        $out = $result2->fetch();

                        $get_group = "SELECT * FROM group_table WHERE user_id = $user_id";
                        $result3 = $mysqli->query($get_group);
                        $group_out = $result3->fetch();
                        include __DIR__ . '/logged_in.html.php';
                    else: ?>
                        <section class="py-5">
                            <div class="container py-5">
                                <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Dracula-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Ghostface-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Jack-o-lantern-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Mummy-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Mike-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                    <div class="col mb-4">
                                        <div class="text-center"><img class="rounded mb-3 fit-cover" width="150"
                                                height="150" src="assets/img/products/Zombie-PVZ-icon.png">
                                            <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                                            <p class="text-muted mb-2">Erat netus</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                            <div class="text-center"
                                style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"></div>
                            <div class="text-center text-sm-center text-md-center text-lg-center text-xl-center"
                                style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"></div>
                            <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="py-5"></section>
        <section></section>
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
                            <p class="bg-dark border rounded border-dark p-4">Nisi sit justo faucibus nec ornare amet,
                                tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50"
                                    height="50" src="assets/img/team/avatar2.jpg">
                                <div>
                                    <p class="fw-bold text-primary mb-0">John Smith</p>
                                    <p class="text-muted mb-0">Erat netus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="d-flex flex-column align-items-center align-items-sm-start">
                            <p class="bg-dark border rounded border-dark p-4">Nisi sit justo faucibus nec ornare amet,
                                tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50"
                                    height="50" src="assets/img/team/avatar4.jpg">
                                <div>
                                    <p class="fw-bold text-primary mb-0">John Smith</p>
                                    <p class="text-muted mb-0">Erat netus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="d-flex flex-column align-items-center align-items-sm-start">
                            <p class="bg-dark border rounded border-dark p-4">Nisi sit justo faucibus nec ornare amet,
                                tortor torquent. Blandit class dapibus, aliquet morbi.</p>
                            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50"
                                    height="50" src="assets/img/team/avatar5.jpg">
                                <div>
                                    <p class="fw-bold text-primary mb-0">John Smith</p>
                                    <p class="text-muted mb-0">Erat netus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-dark">
            <div class="container py-4 py-lg-5">
                <hr>
                <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                    <p class="mb-0">Copyright © 2023 Monster Mash</p>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                </path>
                            </svg></li>
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                </path>
                            </svg></li>
                        <li class="list-inline-item"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/bold-and-dark.js"></script>
    <?php endif ?>
</body>

</html>