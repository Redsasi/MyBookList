<?php

    //si il n'y a pas de droit admin aucun livre ne se rajoute
    if(!isset($_SESSION['isAdmin'])){
        header("Location: index.php");
    }

    if(isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['type']) && !empty($_POST['type']) &&
    isset($_POST['description']) && !empty($_POST['description'])){
        
        $name = htmlspecialchars($_POST['name']);
        $idType = htmlspecialchars($_POST['type']);
        $description = htmlspecialchars($_POST['description']);

        include_once("crud/function.php");
        $conn = getConn();
        if(isset($_FILES['image']) &&
        !empty($_FILES['image']['tmp_name']) &&
        $_FILES['image']['error'] == UPLOAD_ERR_OK){
            //Insertion d'un livre avec image
            $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
            addBook($conn, $name, $idType, $description, $imageData);
        }else{
            //Insertion d'un livre sans image
            addBookNoImage($conn, $name, $idType, $description);
        }
    }
    header("Location: /index.php");
?>