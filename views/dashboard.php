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
        <title>Dashboard</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">

        <link rel="stylesheet" href="../resources/css/style.css">

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

        <header>
            <?php
                include "../utils/navbar.php";
            ?>
        </header>


        <div class="wrapper">
            
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>