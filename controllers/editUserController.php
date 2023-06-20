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

    //Only if post
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if(isset($_POST['btnDeleteUser'])) 
        {
            $userId = $_SESSION["userId"];

            try
            {

                //Update user query
                $dbConn -> query("delete from userExams where idUser = '$userId'");

                //Update user query
                $dbConn -> query("delete from users where idUser = '$userId'");
                
                //Close database connection
                closeConn($dbConn);

                session_destroy();

                header("Location: ../login.php");

            }
            //SQL query exception
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
            }
        }

        //Update User
        if(isset($_POST['btnUpdateUser'])) 
        {
            $userId = $_SESSION["userId"];
            $userNameInput = $_POST["userName"];
            $userEmailInput = $_POST["email"];

            //If empty passwords
            if(empty($_POST["password"]) and empty($_POST["passwordConfirm"]))
            {    
                try
                {
                    //Update user query
                    $dbConn -> query("update users set userName = '$userNameInput', email='$userEmailInput' where idUser = '$userId'");
                    $_SESSION["nameUser"] = $userNameInput;
                    $_SESSION["emailUser"] = $userEmailInput;

                    //Close database connection
                    closeConn($dbConn);

                    header("Location: ../views/dashboard.php");

                }
                //SQL query exception
                catch(Exception $e)
                {
                    $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                }
            }
            else
            {
                if($_POST["password"] === $_POST["passwordConfirm"])
                {
                    $userPasswordInput = $_POST["password"];

                    try
                    {
                        //Update user query
                        $dbConn -> query("update users set userName = '$userNameInput', email='$userEmailInput', password='$userPasswordInput' where idUser = '$userId'");
                        $_SESSION["nameUser"] = $userNameInput;
                        $_SESSION["emailUser"] = $userEmailInput;

                        //Close database connection
                        closeConn($dbConn);

                        header("Location: ../views/dashboard.php");

                    }
                    //SQL query exception
                    catch(Exception $e)
                    {
                        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                    }
                }
                else{
                    $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Passwords don't match</div>";
                }
            }
        }
    }


?>