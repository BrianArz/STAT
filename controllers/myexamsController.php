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

    //Get Post Values
    $operation = $_POST["operation"];
    $idExam = $_POST["idExam"];

    //Only if post
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if($operation === "deleteExam")
        {
            try
            {
                //Update user query
                $dbConn -> query("delete from exams where idExam = '$idExam'");
                
                //Close database connection
                closeConn($dbConn);
            }
            //SQL query exception
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
            }
        }
    }
?>