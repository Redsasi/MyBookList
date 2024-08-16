<?php

    //si il n'y a pas de droit admin aucun livre ne se rajoute
    if(!isset($_SESSION['isAdmin'])){
        header("Location: index.php");
    }
    
    if(isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['description']) && !empty($_POST['description'])){
        
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);


        include_once("crud/function.php");
        $conn = getConn();
        
        //Insertion du type de livre
        addBookType($conn, $name, $description);
    }
    header("Location: /index.php");
?>