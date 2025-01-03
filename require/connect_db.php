<?php

    if( $_SERVER["SERVER_NAME"] == "theops" ){

        $dbName = "theops";
        $dbServer = "localhost";
        $dbUser = "root";
        $dbPassword = "";

    }elseif( $_SERVER["SERVER_NAME"] == "theops.ovh" ){

        $dbName = "theopsmwrs";
        $dbServer = "theopsmwrs.mysql.db";
        $dbUser = "theopsmwrs";
        $dbPassword = "cbvFrs9DTXSBe23tTUhWteY8ZpPZHu";

    }else{

        throw new Exception('Serveur inconnu');

    }

    try{
        
        $mysqlClient = new PDO('mysql:host='.$dbServer.';dbname='. $dbName .';charset=utf8', $dbUser, $dbPassword);

    }catch (Exception $e){

        die('Erreur : ' . $e->getMessage());

    }

?>