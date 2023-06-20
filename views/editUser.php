<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit User</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="../resources/css/style.css">
    </head>

    <body>

        <header>
            <?php
                include "../utils/navbar.php";
            ?>
        </header>

        <div class="wrapper">
            <div class="accessContainer box">
                <img class="logo" src="../resources/img/editUser.png" alt="Edit User Icon" />
                <h1 class="mb-3">Edit User</h1>
                <form method="post" action="">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="userName" />
                        <label>Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" />
                        <label>Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                        <label>Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="passwordConfirm" />
                        <label>Confirm Password</label>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button name="btnSignUp" class="btn btn-lg btn-primary" type="submit">Sign Up</button>
                    </div>

                    <?php
                        
                    ?>

                    <p>Already have account? <a href="../login.php">Login</a> </p>
                </form>
            </div>
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>