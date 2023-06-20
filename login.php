<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" href="resources/vendors/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="resources/css/style.css">

        <style>
            .wrapperImg{
                background: #2562b2;  /* fallback colour. Make sure this is just one solid colour. */
                background: -webkit-linear-gradient(rgba(253, 254, 255, 0.8), rgba(32, 92, 182, 0.8)), url("resources/img/loginBackground.jpg");
                background: linear-gradient(rgba(253, 254, 255, 0.8), rgba(32, 92, 182, 0.8)), url("resources/img/loginBackground.jpg"); /* The least supported option. */
                background-size: cover;
            }
        </style>
    </head>

    <body>
        <div class="wrapper wrapperImg">
            <div class="accessContainer box">
                <img class="logo" src="resources/img/login.png" alt="Login" />
                <h1 class="mb-3">Login</h1>
                <form method="post" action="">
                    
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" />
                        <label>Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                        <label>Password</label>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button name="btnLogin" class="btn btn-lg btn-primary" type="submit">Login</button>
                    </div>

                    <?php
                    include "controllers/loginController.php";
                    ?>

                    <p>Don't have account? <a href="views/signup.php">Sign Up</a> </p>
                    <!-- <a href="#">Recover Password</a> -->
                </form>
            </div>
        </div>

        <script src="resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>