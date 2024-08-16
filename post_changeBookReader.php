<?php

//si il n'y a pas de droit admin aucun livre ne se rajoute
session_start();
if(!isset($_SESSION['ConnexionID'])){
    header("Location: index.php");
}

if(isset($_GET['bookId']) && !empty($_GET['bookId']) &&
isset($_POST['statut']) && !empty($_POST['statut'])){
    
    $bookId = htmlspecialchars($_GET['bookId']);
    $statut = $_POST['statut'];
    $userId = $_SESSION['ConnexionID'];


    include_once("crud/function.php");
    $conn = getConn();
    
    //Verifier si il y a déjà une liaison
    $prestatu = getReaderBookStatus($conn, $userId, $bookId);
    if($prestatu == null){
        //si non en ajouter une
        addReaderBookStatus($conn, $userId, $bookId, $statut);
    }else{
        //si oui la modifier
        updateReaderBookStatus($conn, $userId, $bookId, $statut);
    }
    header("Location: bookDetails.php?id=".$bookId);
    exit();
}
header("Location: index.php");
?>