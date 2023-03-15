<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Join A Group</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic%2C400italic%2C600italic%2C700italic%2C800italic%2C400%2C300%2C600%2C700%2C800&amp;display=swap">
</head>

<body>

    <body style="/*background: url(&quot;design.jpg&quot;);*/background-position: 0 -60px;">
        <nav id="mainNav"
            class="navbar navbar-dark navbar-expand-md sticky-top border-secondary shadow navbar-shrink py-3">
            <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span>Monster Match</span></a><button class="navbar-toggler"
                    data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div id="navcol-2" class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
</ul> <a class="btn btn-outline-warning" role="button" href="logout.php">Log Out</a>
                    
                </div>
            </div>
        </nav>
        <header class="bg-dark">
            <div class="container pt-4 pt-xl-5">
                <div class="row pt-5">
                    <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                        <div class="text-center">
                            <h1 class="display-2 fw-bold text-center"><span style="color: rgb(4, 188, 44);">Join A Group</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <br>


                        <form action="join_group.php" method="post" id="join_group" novalidate>
                            <div class="text-center">
                                <!--<label for="name">Group Name</label>-->
                                <input type="number" id="group_id" name="group_id" placeholder="Enter Group ID">

                            <button>Join</button>
                            </div>
                        </form>

    </body>

</html>