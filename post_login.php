<?php

    if(isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        include_once("crud/function.php");
        $conn = getConn();
        $user = getUserByLogin($conn, $email, $password);
        if($user == null){
            header("Location: login.php?InvalideLogin=");
            exit();
        }
        //connection
        session_start();
        $_SESSION['ConnexionID'] = $user['Lect_Id'];
        $_SESSION['isAdmin'] = $user['Lect_admin'];
    }
    header("Location: /index.php");
?>