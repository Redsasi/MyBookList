<?php
function getConn(){
    $conn = new PDO(
        'mysql:host=localhost;dbname=mybooklist;charset=utf8',
        'root',
        ''
    );
    return $conn;
}
?>
