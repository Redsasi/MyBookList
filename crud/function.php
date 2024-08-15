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
?>