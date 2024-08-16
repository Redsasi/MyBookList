<?php
function getConn(){
    $conn = new PDO(
        'mysql:host=hhva.myd.infomaniak.com;dbname=hhva_saiam;charset=utf8',
        'hhva_saiam',
        '3JEjBw9_zZ2'
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

function addBookCat($conn, $catName, $catDescription){
    $req = $conn->prepare('insert into mbl_categorie (`Cat_Nom`, `Cat_Description`) values(:Cat_Nom, :Cat_Description)');
    $req->execute([
        'Cat_Nom' => $catName,
        'Cat_Description' => $catDescription
    ]);
}

function addCatToBook($conn, $bookId, $catId){
    $req = $conn->prepare('insert into mbl_catlivre (`CatLivre_Livre`, `CatLivre_Categorie`) values(:bookId, :categorieId)');
    $req->execute([
        'bookId' => $bookId,
        'categorieId' => $catId
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

function getBooks($conn){
    $req = $conn->prepare('SELECT * FROM mbl_livre');
    $req->execute();
    $books = $req->fetchAll();
    return $books;
}

function getBooksSearch($conn,$searchValue){
    $req = $conn->prepare("SELECT * FROM mbl_livre WHERE `Lvr_Nom` LIKE :search");
    $req->execute([
        'search' => "%".$searchValue."%"
    ]);
    $books = $req->fetchAll();
    return $books;
}

function getBookDetailsById($conn, $id){
    $req = $conn->prepare("SELECT Lvr_Id, Lvr_Nom, Lvr_Description, Lvr_Image, Type_Nom FROM mbl_livre JOIN mbl_type ON `Lvr_Type` = `Type_Id` WHERE `Lvr_Id` = :id");
    $req->execute([
        'id' => $id
    ]);
    $books = $req->fetchAll();
    return $books[0];
}
function getCategorieNameOfBookId($conn, $id){
    $req = $conn->prepare("SELECT Cat_Nom FROM mbl_catlivre JOIN mbl_categorie on `CatLivre_Categorie` = `Cat_Id` WHERE `CatLivre_Livre` = :id");
    $req->execute([
        'id' => $id
    ]);
    $categories = $req->fetchAll();
    return $categories;
}

function getNoCatBook($conn, $bookId){
    $req = $conn->prepare("SELECT Cat_Id, Cat_Nom FROM mbl_categorie LEFT JOIN mbl_catlivre ON Cat_Id = CatLivre_Categorie AND CatLivre_Livre = :livreId WHERE CatLivre_Categorie IS NULL");
    $req->execute([
        'livreId' => $bookId
    ]);
    $categories = $req->fetchAll();
    return $categories;
}

function getBooksByReader($conn, $idReader, $link){
    $req = $conn->prepare('SELECT * FROM mbl_lecteurlivre JOIN mbl_livre ON `LectLivre_Livre` = `Lvr_Id` WHERE `LectLivre_Lecteur` = :readerId AND `LectLivre_Type` = :typeLink');
    $req->execute([
        'readerId' => $idReader,
        'typeLink' => $link
    ]);
    $books = $req->fetchAll();
    return $books;
}

function getBooksSearchByReader($conn, $searchValue, $idReader, $link){
    $req = $conn->prepare('SELECT * FROM mbl_lecteurlivre JOIN mbl_livre ON `LectLivre_Livre` = `Lvr_Id` WHERE `LectLivre_Lecteur` = :readerId AND `LectLivre_Type` = :typeLink AND `Lvr_Nom` LIKE :search');
    $req->execute([
        'readerId' => $idReader,
        'typeLink' => $link,
        'search' => "%".$searchValue."%"
    ]);
    $books = $req->fetchAll();
    return $books;
}

function getReaderBookStatus($conn, $idReader, $idBook){
    $req = $conn->prepare('SELECT * FROM mbl_lecteurlivre WHERE `LectLivre_Livre` = :bookId AND `LectLivre_Lecteur` = :readerId');
    $req->execute([
        'bookId' => $idBook,
        'readerId' => $idReader
    ]);
    $status = $req->fetchAll();
    if(!empty($status)){
        return $status;
    }else{
        return null;
    }
}

function addReaderBookStatus($conn, $idReader, $idBook, $status){
    $req = $conn->prepare('insert into mbl_lecteurlivre (`LectLivre_Livre`, `LectLivre_Lecteur`, `LectLivre_Type`) values(:bookId, :readerId, :status)');
    $req->execute([
        'bookId' => $idBook,
        'readerId' => $idReader,
        'status' => $status
    ]);
}

function updateReaderBookStatus($conn, $idReader, $idBook, $status){
    $req = $conn->prepare('update mbl_lecteurlivre set LectLivre_Type = :status where LectLivre_Livre = :bookId and LectLivre_Lecteur = :readerId');
    $req->execute([
        'bookId' => $idBook,
        'readerId' => $idReader,
        'status' => $status
    ]);
}

?>