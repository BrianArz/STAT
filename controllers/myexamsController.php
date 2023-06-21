<?php

    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Database connection try
    try
    {
        $dbConn = openConn();
    }
    //Database exception
    catch(Exception $e)
    {
        file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
    }

    //Only if post
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        //Get Post Values
        $operation = $_POST["operation"];
        $idExam = $_POST["idExam"];

        if($operation === "deleteExam")
        {
            file_put_contents('error_log.txt', $idExam , FILE_APPEND);
            try
            {
                $sql = $dbConn -> query("select pdf from exams where idExam = '$idExam'");

                if($examData = $sql -> fetch_object())
                {
                    $pdfName = $examData ->  pdf;
                }

                $pdfRoute = "../resources/files/" . $pdfName;

                if(file_exists($pdfRoute))
                {
                    if(unlink($pdfRoute))
                    {
                        //Update user query
                        $dbConn -> query("delete from exams where idExam = '$idExam'");

                        //Close database connection
                        closeConn($dbConn);
                    }
                }
            }
            //SQL query exception
            catch(Exception $e)
            {
                file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
            }
        }
    }
?>