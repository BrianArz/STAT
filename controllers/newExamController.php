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

    //Get Session Values
    $idUser = $_SESSION["userId"];

    //Only if post
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if(isset($_POST["btnUploadExam"]))
        {
            //Get form values
            $examTitle = $_POST["title"];
            $examSubject = $_POST["subject"];
            $examSchool = $_POST["school"];
            $examProfessor = $_POST["professor"];
            $examYear = $_POST["year"];

            //Only if valid pdf file
            if($_FILES['pdf']['error'] == UPLOAD_ERR_OK && $_FILES['pdf']['type'] == 'application/pdf'){
                
                $dir = "../resources/files/";
            
                $filename = uniqid() . '.pdf';

                try
                {
                    if(move_uploaded_file($_FILES['pdf']['tmp_name'], $dir . $filename))
                    {
                        $examFilename = $filename;

                        $sql = "insert into exams (year, title, subject, professor, pdf, school, idUser) VALUES ('$examYear', '$examTitle', '$examSubject' , '$examProfessor' , '$examFilename' , '$examSchool' , '$idUser')";

                        if ($dbConn->query($sql) === TRUE) 
                        {
                            closeConn($dbConn);
                            header("Location: ../views/myexams.php");
                        } 
                        else 
                        {
                            closeConn($dbConn);
                            echo "Error al guardar el archivo: " . $dbConn->error;
                        }
                    }
                }
                catch(Exception $e)
                {
                    $errorMessage = "<div class='alert alert-alert d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                }
            } else {
                $errorMessage = "<div class='alert alert-alert d-grid gap-2 mb-3' role='alert'>Invalid File</div>";
            }

            $errorMessage = "<div class='alert alert-primary d-grid gap-2 mb-3' role='alert'>Hola!</div>";
        }
    }
?>