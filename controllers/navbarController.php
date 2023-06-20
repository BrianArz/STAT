<?php 

    session_start(); 

    //Only when is a POST call
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if(!empty($_POST['btnLogOut'])) 
        {
            session_destroy(); 
            header("Location: ../login.php"); 
        }

        if(!empty($_POST['btnEditUser'])) 
        { 
            header("Location: ../views/editUser.php"); 
        }
    }

?> 