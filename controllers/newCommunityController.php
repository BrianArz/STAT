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

    $idUser = $_SESSION["userId"];

    //Only if post
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(isset($_POST["btnUploadCommunity"]))
        {
            //Get form values
            $comTitle = $_POST["title"];
            $comAuthor = $_POST["author"];
            $comCountry = $_POST["country"];
            $comLanguage = $_POST["language"];
            $comDescription = $_POST["description"];

            //Sql try
            try
            {
                //TO-DO check duplicated communities

                $sql = "insert into communities (title, author, country, lang, description) values ('$comTitle' , '$comAuthor' ,  '$comCountry' , '$comLanguage' , '$comDescription')";

                if($dbConn -> query($sql) === TRUE)
                {

                    //TO-DO How to get the id of the community just created?

                    $sqlQuery = $dbConn -> query("select idCommunity from communities where title = '$comTitle' and description = '$comDescription'");

                    if($queryData = $sqlQuery -> fetch_object())
                    {
                        $commId = $queryData -> idCommunity;

                        $dbConn -> query("insert into userscommunities (idUser, idCommunity) values ('$idUser' , '$commId')");

                        closeConn($dbConn);
                        header("Location: ../views/myCommunities.php");
                    }
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
    }

?>