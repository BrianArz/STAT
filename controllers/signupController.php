<?php
    //Star session on browser
    session_start();

    //Include database connection model
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Only when is a POST call
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        //If Login button is pressed
        if (isset($_POST["btnSignUp"])) 
        {
            //If username, email, password and passwordConfirm are not empty
            if(!empty($_POST["userName"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["passwordConfirm"]))
            {
                $userName = $_POST["userName"];
                $userEmail = $_POST["email"];
                $userPassword = $_POST["password"];
                $userPasswordConfirm = $_POST["passwordConfirm"];

                //If passwords match
                if($userPassword === $userPasswordConfirm)
                {
                    try
                    {
                        //Try database connection
                        $dbConn = openConn();
                        
                        try
                        {
                            $sqlEmail = $dbConn -> query("select * from users where email = '$userEmail'");
                            $sqlUserName = $dbConn -> query("select * from users where userName = '$userName'");

                            if($sqlEmail -> fetch_object())
                            {
                                echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Email is already used!</div>";
                            }
                            elseif($sqlUserName -> fetch_object())
                            {
                                echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Username is already used!</div>";
                            }
                            else
                            {
                                $dbConn -> query("insert into users (userName, email, password, role) values ('$userName' , '$userEmail' , '$userPassword' , 0)");

                                $sql = $dbConn -> query("select idUser, role from users where userName = '$userName'");

                                if($userData = $sql -> fetch_object())
                                {
                                    $_SESSION["userId"] = $userData -> idUser;
                                    $_SESSION["nameUser"] = $userName;
                                    $_SESSION["emailUser"] = $userEmail;
                                    $_SESSION["userRole"] = $userData -> role;
                                }
                                else
                                {
                                    throw new Exception('Unable to fetch user data');
                                }
                                
                                //Close database connection
                                closeConn($dbConn);

                                header("location: ../views/dashboard.php");
                            }

                        }
                        //SQL query exception
                        catch(Exception $e)
                        {
                            echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                        }

                    }
                    //Database exception
                    catch(Exception $e)
                    {
                        echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                    }
                }
                else{
                    echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Password don't match!</div>"; 
                }
            }
            else
            {
                echo "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Missing Fields!</div>";
            }
        }
    }

?>