<?php

//si il n'y a pas de droit admin aucun livre ne se rajoute
session_start();
if(!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)){
    header("Location: index.php");
}

if(isset($_GET['bookId']) && !empty($_GET['bookId']) &&
isset($_POST['cat']) && !empty($_POST['cat'])){
    
    $bookId = htmlspecialchars($_GET['bookId']);
    $catId = htmlspecialchars($_POST['cat']);


    include_once("crud/function.php");
    $conn = getConn();
    
    //Insertion du type de livre
    addCatToBook($conn, $bookId, $catId);
    header("Location: bookDetails.php?id=".$bookId);
    exit();
}
header("Location: index.php");
?>