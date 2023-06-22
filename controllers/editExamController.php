<?php

    //Starts browser session
    session_start();

    //If not logged redirect to login
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    //Include database connection controller
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Initialize error message
    $errorMessage = "";

    //Get id exam
    $idExam = $_GET["idExam"];

    //Database connection try
    try
    {
        $dbConn = openConn();

        //Sql try | Get all values from exam to edit
        try
        {
            $sql = $dbConn -> query("select * from exams where idExam = '$idExam'");

            //If query is not null
            if($examData = $sql -> fetch_object())
            {
                $examTitle = $examData -> title;
                $examSubject = $examData -> subject;
                $examSchool = $examData -> school;
                $examProfessor = $examData -> professor;
                $examYear = $examData -> year;

                closeConn($dbConn);
            }
            //If query null
            else
            {
                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't fetch exam data</div>";
            }

        }
        //Sql exception
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

    //If form is sent through post method
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        //If button is clicked
        if(isset($_POST['btnSaveExam'])) 
        {
            //Get all post values
            $examTitle = $_POST["title"];
            $examSubject = $_POST["subject"];
            $examSchool = $_POST["school"];
            $examProfessor = $_POST["professor"];
            $examYear = $_POST["year"];

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

            //If uploaded new exam
            if($_FILES['pdf']['error'] == UPLOAD_ERR_OK && $_FILES['pdf']['type'] == 'application/pdf')
            {
                //Sql try | gets old exam name 
                try
                {
                    $sql = $dbConn -> query("select pdf from exams where idExam = '$idExam'");

                    //If query not null
                    if($examPdfSql = $sql -> fetch_object())
                    {
                        $pdfName = $examPdfSql -> pdf;

                        //Define files folder route
                        $fileDir = "../resources/files/";
                        //Define old exam complete route
                        $oldExamRoute = $fileDir . $pdfName;

                        //If file exists
                        if(file_exists($oldExamRoute))
                        {
                            //If file deleted
                            if(unlink($oldExamRoute))
                            {
                                $newPdfName = uniqid() . '.pdf';
                                $newExamRoute = $fileDir . $newPdfName;

                                //If file created
                                if(move_uploaded_file($_FILES['pdf']['tmp_name'], $newExamRoute))
                                {
                                    $examFileName = $newPdfName;

                                    //Sql try
                                    try
                                    {
                                         //Updates name in database
                                        $dbConn -> query("update exams set pdf = '$examFileName' where idExam = '$idExam'");
                                    }
                                    //Sql exception
                                    catch(Exception $e)
                                    {
                                        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                                        
                                    }
                                }
                                else
                                {
                                    $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't create new exam file</div>";
                                    exit();
                                }
                            }
                            else
                            {
                                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't delete old exam file</div>";
                                exit(); 
                            }
                        }
                        else
                        {
                            $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't find old exam file</div>";
                            exit();   
                        }
                    }
                    //If query null
                    else
                    {
                        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Couldn't get old exam name!</div>";
                        exit();
                    }    
                }
                //Sql exception
                catch(Exception $e)
                {
                    $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                }
            
            }

            //Sql try
            try
            {
                //Updates remaining exam values
                $dbConn -> query("update exams set title = '$examTitle', subject = '$examSubject', school = '$examSchool', professor = '$examProfessor', year = '$examYear' where idExam = '$idExam'");

                //Close Connection
                closeConn($dbConn);

                header("Location: ../views/myexams.php");
            }
            //Sql exception
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-primary d-grid gap-2 mb-3' role='alert'>Hola!</div>";
            }
        }
    }

?>