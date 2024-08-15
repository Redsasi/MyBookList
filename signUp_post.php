<?php

    if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash(htmlspecialchars($_POST['password']),PASSWORD_DEFAULT);


        include_once("crud/function.php");
        $conn = getConn();
        if(userExist($conn,$email)){
            header("Location: signUp.php?EmailUsed=");
        }
        
        
        
        /*Insertion de la personne*/


        //Connexion directe au profil crée
    }
    header("Location: index.php");
?>