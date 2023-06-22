<?php

    //Include database connection model
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

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

    $userId = $_SESSION["userId"];

?>