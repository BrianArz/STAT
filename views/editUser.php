<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    include "../controllers/editUserController.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit User</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="../resources/css/style.css">

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->


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
                <h1 class="mb-3">Edit</h1>
                <form method="post" action="">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="userName" value="<?php echo $_SESSION["nameUser"]?>"/>
                        <label>Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php echo $_SESSION["emailUser"]?>" />
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

                    <?php echo $errorMessage; ?>

                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <button name="btnDeleteUser" class="btn btn-lg btn-danger col-lg-12" type="submit">Delete Account</button>
                        </div>

                        <div class="col-lg-6 mb-2">
                            <button name="btnUpdateUser" class="btn btn-lg btn-success col-lg-12" type="submit">Save Changes</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>