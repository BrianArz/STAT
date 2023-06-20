<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="../resources/css/style.css">

        <style>
            .wrapperImg{
                background: #2562b2;  /* fallback colour. Make sure this is just one solid colour. */
                background: -webkit-linear-gradient(rgba(253, 254, 255, 0.8), rgba(32, 92, 182, 0.8)), url("../resources/img/signupBackground.jpg");
                background: linear-gradient(rgba(253, 254, 255, 0.8), rgba(32, 92, 182, 0.8)), url("../resources/img/signupBackground.jpg"); /* The least supported option. */
                background-size: cover;
            }
        </style>
    </head>

    <body>

    <div class="wrapper wrapperImg">
        <div class="accessContainer box">
            <img class="logo" src="../resources/img/sign-up.png" alt="Signup Icon" />
            <h1 class="mb-3">Sign-Up</h1>
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
                    include "../controllers/signupController.php";
                ?>

                <p>Already have account? <a href="../login.php">Login</a> </p>
            </form>
        </div>
    </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>