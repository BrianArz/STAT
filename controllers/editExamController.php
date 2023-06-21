<?php

    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    $errorMessage = "";
    $idExam = $_GET["idExam"];

    //Database connection try
    try
    {
        $dbConn = openConn();

        try
        {
            $sql = $dbConn -> query("select * from exams where idExam = '$idExam'");

            if($examData = $sql -> fetch_object())
            {
                $examTitle = $examData -> title;
                $examSubject = $examData -> subject;
                $examSchool = $examData -> school;
                $examProfessor = $examData -> professor;
                $examYear = $examData -> year;

                closeConn($dbConn);
            }
            else
            {
                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't fetch exam data</div>";
            }

        }
        catch(Exception $e)
        {
            $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
        }

    }
    //Database exception
    catch(Exception $e)
    {
        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if(isset($_POST['btnSaveExam'])) 
        {

            $examTitle = $_POST["title"];
            $examSubject = $_POST["subject"];
            $examSchool = $_POST["school"];
            $examProfessor = $_POST["professor"];
            $examYear = $_POST["year"];

            try
            {
                $dbConn = openConn();
            }
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
            }

            //Save new exam condition -> 1. Delele old exam | 2. Upload new exam
            if(!empty($_POST["pdf"]))
            {

            }

            try
            {
                $result = $dbConn -> query("update exams set title = '$examTitle', subject = '$examSubject', school = '$examSchool', professor = '$examProfessor', year = '$examYear' where idExam = '$idExam'");

                closeConn($dbConn);

                header("Location: ../views/myexams.php");
            }
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-primary d-grid gap-2 mb-3' role='alert'>Hola!</div>";
            }
        }
    }

?>