<?php

//si il n'y a pas de droit admin aucun livre ne se rajoute
session_start();
if(!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)){
    header("Location: index.php");
}

    
    if(isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['description']) && !empty($_POST['description'])){
        
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);


        include_once("crud/function.php");
        $conn = getConn();
        
        //Insertion du type de livre
        addBookCat($conn, $name, $description);
    }
    header("Location: /index.php");
?>