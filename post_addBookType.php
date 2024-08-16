<?php

    if(isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['description']) && !empty($_POST['description'])){
        
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);


        include_once("crud/function.php");
        $conn = getConn();
        
        //Insertion de l'utilisateur
        addBookType($conn, $name, $description);
    }
    header("Location: /index.php");
?>