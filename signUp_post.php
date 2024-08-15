<?php

    if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);


        include_once("crud/function.php");
        $conn = getConn();
        if(userExist($conn,$email)){
            header("Location: signUp.php?EmailUsed=");
        }
        
        //Insertion de l'utilisateur
        creatUser($conn,$pseudo,$password,$email);

        session_start();
        // connexion de l'utilisateur
        $user = getUserOfEmail($conn, $email);
        $_SESSION['ConnexionID'] = $user['Lect_Id'];
        $_SESSION['isAdmin'] = $user['Lect_admin'];
    }
    header("Location: index.php");
?>