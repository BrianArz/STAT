<?php

    //If not logged redirect to login
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    //Include database connection controller
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Initialize error message
    $errorMessage = "";

    //Database connection try
    try
    {
        $dbConn = openConn();
    }
    //Database exception
    catch(Exception $e)
    {
        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
    }

?>