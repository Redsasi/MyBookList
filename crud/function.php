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
    $req->execute(['email' => $email]);
    $nbUser = $req->fetchAll();
    print_r($nbUser[0]);
    return $nbUser[0]['COUNT(*)'] > 0;
}

function CreatUser($conn, $pseudo, $email, $password){
    $req = $conn->prepare('SELECT COUNT(*) FROM mbl_lecteur WHERE `Lect_email` = :email');
    $req->execute(['email' => $email]);
    $nbUser = $req->fetchAll();
    print_r($nbUser[0]);
    return $nbUser[0]['COUNT(*)'] > 0;
}
?>