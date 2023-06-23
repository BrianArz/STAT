<?php 

    //Include database connection controller
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    //Initialize error message
    $errorMessage = "";

    //Get id community
    $idCommunity = $_GET["idCommunity"];
    $idUser = $_SESSION["userId"];

    $isEditUser = false;

    //Database connection try
    try
    {
        $dbConn = openConn();

        //Sql try | Get all values from exam to edit
        try
        {
            $sql = $dbConn -> query("select c.* from communities as c inner join userscommunities as uc on c.idCommunity = uc.idCommunity where uc.idCommunity = '$idCommunity' and uc.idUser = '$idUser'");

            if($sql -> num_rows > 0)
            {
                $isEditUser = true;
            }

            $sqlGeneral = $dbConn -> query("select * from communities where idCommunity = '$idCommunity'");

            if($sqlGeneral -> num_rows > 0)
            {
                $commData = $sqlGeneral -> fetch_object();

                $commTitle = $commData -> title; 
                $commAuthor = $commData -> author;
                $commCountry = $commData -> country;
                $commLanguage = $commData -> lang;
                $commDescription = $commData -> description;  
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
        $operation = $_POST["operation"];

        //If button is clicked
        if(isset($_POST['btnSaveCommunity'])) 
        {
            //Get all post values 
            $commTitle = $_POST["title"];
            $commAuthor = $_POST["author"];
            $commCountry = $_POST["country"];
            $commLanguage = $_POST["language"];
            $commDescription = $_POST["description"];

            //Sql try
            try
            {
                //TO-DO check duplicated communities

                $sql = "update communities set title ='$commTitle', author='$commAuthor', country='$commCountry', lang='$commLanguage', description='$commDescription' where idCommunity='$idCommunity'";

                if($dbConn -> query($sql) === TRUE)
                {

                    closeConn($dbConn);
                    header("Location: ../views/myCommunities.php");
                }
                else{
                    closeConn($dbConn);
                    $errorMessage = "<div class='alert alert-alert d-grid gap-2 mb-3' role='alert'>Couldn't save Community</div>";
                }
            }
            //Sql exception
            catch(Exception $e)
            {
                $errorMessage = "<div class='alert alert-alert d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
            }

        }

        if($operation === "addExam")
        {

            $myExam =  $_POST["idExam"];
            $myIdCommunity = $_POST["idCommunity"];

            $dbConn -> query("insert into examscommunities (idExam, idCommunity) values ('$myExam' , '$myIdCommunity')");

            header("Refresh(0)");
        }



        if($operation === "deleteExam")
        {
            
            $idExam = $_POST["idExam"];
            $idCommunityDelete = $_POST["idCommunity"];

            $dbConn -> query("delete from examscommunities where idExam = '$idExam' and idCommunity = '$idCommunityDelete'");
            closeConn($dbConn);
        }

        if(isset($_POST['btnDeleteCommunity']))
        {
            $dbConn -> query("delete from userscommunities where idCommunity = '$idCommunity'");

            $dbConn -> query("delete from examscommunities where idCommunity = '$idCommunity'");

            $dbConn -> query("delete from communities where idCommunity = '$idCommunity'");

            closeConn($dbConn);

            header("Location: ../views/myCommunities.php");
        }
        

    }
?>