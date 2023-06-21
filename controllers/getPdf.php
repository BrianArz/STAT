<?php 

    session_start();

    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    $idExam = $_GET["idExam"];
    $idUsuario = $_SESSION["userId"];

    //Database connection try
    try
    {
        $dbConn = openConn();

        try
        {
            //Update user query
            $sql = $dbConn -> query("select * from exams where idExam = '$idExam' and idUser = '$idUsuario'");

            if($examData = $sql -> fetch_object())
            {
                $fileName = $examData -> pdf;
                
                closeConn($dbConn);

                header("Location: ../resources/files/" .$fileName);
                
            } 
            else
            {
                header("Location: ../views/dashboard/");
            }
            
        }
        //SQL query exception
        catch(Exception $e)
        {
            file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
        }
    }
    //Database exception
    catch(Exception $e)
    {
        file_put_contents('error_log.txt', $e->getMessage(), FILE_APPEND);
    }

    
  
?>
        
          