<?php

    function openConn()
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "statdb";

        $dbConn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName) or die ("Connection failed: %s\n". $dbConnection -> error);
        $dbConn->set_charset("utf8");

        return $dbConn;
    }

    function closeConn($dbConn)
    {
        $dbConn -> close();
    }




?>