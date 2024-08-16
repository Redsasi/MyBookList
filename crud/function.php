<?php
function getConn(){
    $conn = new PDO(
        'mysql:host=localhost;dbname=mybooklist;charset=utf8',
        'root',
        ''
    );
    return $conn;
}

function userExist($conn, $email){
    $req = $conn->prepare('SELECT COUNT(*) FROM mbl_lecteur WHERE `Lect_email` = :email');
    $req->execute([
        'email' => $email
    ]);
    $nbUser = $req->fetchAll();
    return $nbUser[0]['COUNT(*)'] > 0;
}

function creatUser($conn, $pseudo, $password, $email){
    $password = password_hash($password,PASSWORD_DEFAULT);
    $req = $conn->prepare('INSERT INTO mbl_lecteur (`Lect_Pseudo`, `Lect_MDP`, `Lect_email`, `Lect_admin`) values (:pseudo, :passwd, :email, FALSE)');
    $req->execute([
        'pseudo' => $pseudo,
        'passwd' => $password,
        'email' => $email
    ]);
}

function getUserOfEmail($conn, $email){
    $req = $conn->prepare('SELECT * FROM mbl_lecteur WHERE Lect_email = :email');
    $req->execute([
        'email' => $email
    ]);
    $users = $req->fetchAll();
    return $users[0];
}

function getUserByLogin($conn, $email, $password){
    $req = $conn->prepare('SELECT * FROM mbl_lecteur WHERE Lect_email = :email');
    $req->execute([
        'email' => $email
    ]);
    $users = $req->fetchAll();
    $user = $users[0];
    if(password_verify($password,$user['Lect_MDP'])){
        return $user;
    }else{
        return null;
    }
}

function addBookType($conn, $typeName, $typeDescription){
    $req = $conn->prepare('insert into mbl_type (`Type_Nom`, `Type_Description`) values(:Type_Nom, :Type_Description)');
    $req->execute([
        'Type_Nom' => $typeName,
        'Type_Description' => $typeDescription
    ]);
}

function getBookTypes($conn){
    $req = $conn->prepare('SELECT * FROM mbl_type');
    $req->execute();
    $types = $req->fetchAll();
    return $types;
}

function addBook($conn, $name, $idType, $description, $imageData){
    $req = $conn->prepare('insert into mbl_livre (`Lvr_Nom`, `Lvr_Description`, `Lvr_Type`, `Lvr_Image`) values(:Lvr_Nom, :Lvr_Description, :Lvr_Type, :Lvr_Image);');
    $req->execute([
        'Lvr_Nom' => $name,
        'Lvr_Description' => $description,
        'Lvr_Type' => $idType,
        'Lvr_Image' => $imageData
    ]);
}

function addBookNoImage($conn, $name, $idType, $description){
    $req = $conn->prepare('insert into mbl_livre (`Lvr_Nom`, `Lvr_Description`, `Lvr_Type`) values(:Lvr_Nom, :Lvr_Description, :Lvr_Type)');
    $req->execute([
        'Lvr_Nom' => $name,
        'Lvr_Description' => $description,
        'Lvr_Type' => $idType
    ]);
}
?>