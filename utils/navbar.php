<nav class="navbar fixed-top navbar-expand-lg bg-light">
    <div class="container-fluid">
        <p class="navbar-brand">
            <?php
                echo $_SESSION["nameUser"];
            ?>
        </p>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">   
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown link</a>
                    <ul class="dropdown-menu">
                        <form action="../controllers/navbarController.php" method="post">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><input type="submit" value="Log Out" class="dropdown-item" name="btnLogOut"></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>