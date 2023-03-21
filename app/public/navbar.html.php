<nav id="mainNav" class="navbar navbar-dark navbar-expand-md sticky-top border-secondary shadow navbar-shrink py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span class="btn btn-outline-warning">Home</span></a><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div id="navcol-1" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                <?php if (!isset($user)) : ?>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
            </ul><a class="btn btn-outline-warning shadow" role="button" href="login.html.php">Login</a> <a class="btn btn-outline-warning" role="button" href="signup.html.php">Sign up</a>
        <?php else : ?>
            <li class="nav-item"></li>
            <li class="nav-item"></li>
            </ul><a class="btn btn-outline-warning shadow" role="button" href="logout.php">Log Out</a>
        <?php endif; ?>
        </div>
    </div>
</nav>