<?php

    //Start browser session
    //session_start();

    //Include database connection model
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Only when is a POST call
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        //If Login button is pressed
        if (isset($_POST["btnLogin"])) 
        {
            //If email and password are not empty
            if(!empty($_POST["email"]) and !empty($_POST["password"]))
            {
                $userEmail = $_POST["email"];
                $userPassword = $_POST["password"];

                try 
                {
                    //Try database connection
                    $dbConn = openConn();

                    try
                    {
                        //Try sql query
                        $sql = $dbConn -> query("select * from users where email = '$userEmail' and password = '$userPassword'");

                        if($userData = $sql -> fetch_object())
                        {
                            $_SESSION["userId"] = $userData -> idUser;
                            $_SESSION["nameUser"] = $userData -> userName;
                            $_SESSION["emailUser"] = $userData -> email;
                            $_SESSION["userRole"] = $userData -> role;

                            //Close database connection
                            closeConn($dbConn);

                            header("Location: views/dashboard.php");
                        }
                        else
                        {
                            echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Invalid email or wrong password!</div>";
                        }

                    }
                    //Sql query exception
                    catch(Exception $e)
                    {
                        echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                    }
                }
                //Data base connection exception
                catch(Exception $e) 
                {
                    echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                }
            }
            //Missing Credentials
            else
            {
                echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Missing Credentials!</div>";
            }
        }
    }

?>