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
    </head>

    <body>

        <header>
            <?php
                include "../utils/navbar.php";
            ?>
        </header>


        <div class="wrapperContainer">
            <div class="container">
                <h1>Global Communities</h1>
                <h6>Find the right exam from around the world</h6>
            </div>
            
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>