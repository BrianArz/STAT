<style>
    #blueSpan{
        color: #0D6EFD; 
        font-weight: 500;
    }

    .navbar .nav-link{
        color: black; 
        font-weight: 400;
    }

    .navbar .nav-link:hover{
        color: #0D6EFD; 
    }
</style>

<nav class="navbar fixed-top navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"><span id="blueSpan">Welcome</span> <?php echo $_SESSION["nameUser"]?> <span id="blueSpan"> ! </span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">   
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Communities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Exams</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                    <ul class="dropdown-menu">
                        <form action="../controllers/navbarController.php" method="post">
                            <li><input type="submit" value="Edit" class="dropdown-item" name="btnEditUser"></li>
                            <li><input type="submit" value="Log Out" class="dropdown-item" name="btnLogOut"></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>