<?php
    # LES PARAMETRES DE CONNEXION
    $host="localhost:3306";
    $dbname="bookstore";
    $user="root";
    $password="";

    # CONNEXION A LA BD AVEC PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conn){
        echo "Worked succesfully";
    }
    else{
        echo "An error occured in db connection...";
    }