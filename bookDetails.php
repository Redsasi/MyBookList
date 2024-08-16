<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MyBookList</title>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/BookDetail.css" rel="stylesheet" />
</head>

<body>
    <?php
        include_once("includes/header.php")
    ?>
     <section>
        <?php
            if(!isset($_GET['id']) && empty($_GET['id'])){
                header("location: index.php");
            }
            $bookId = $_GET['id'];
            include_once("crud/function.php");
            $conn = getConn();
            $book = getBookDetailsById($conn, $bookId);
            $categories = getCategorieNameOfBookId($conn, $book["Lvr_Id"]);
            $textCat = "";
            if(!empty($categories)){
                $lastCat = end($categories);
                foreach($categories as $cat){
                    $textCat .= $cat["Cat_Nom"];
                    if($cat !== $lastCat){
                        $textCat .= ", ";
                    }
                }
                $textCat .= ".";
            }else{
                $textCat = "no categorie known.";
            }
            if($book["Lvr_Image"] == NULL){
                echo '<img src="images/BaseBookImage.jpg" alt="TITRE">';
            }else{
                echo '<img src="data:image/jpg;base64,'.base64_encode($book["Lvr_Image"]).'" alt="TITRE">';
            }
        ?>
        
        <div id="details">
            <h1><?=$book["Lvr_Nom"]?></h1>
            <p id="type"><?=$book["Type_Nom"]?></p>
            <p id="description"><?=$book["Lvr_Description"]?></p>
            <p id="categories"><?=$textCat?></p>
            <?php
                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
                    ?>
                    <form action="post_addBookCat.php?bookId=<?=$book["Lvr_Id"]?>" method="post">
                        <label id="Categories">Ajouter une catégories : </label>
                        <select name="cat" id="cat" required>
                            <?php
                                include_once("crud/function.php");
                                $categories = getNoCatBook($conn, $book["Lvr_Id"]);
                                foreach($categories as $cat){
                                    echo "<option value='".$cat['Cat_Id']."'>".$cat['Cat_Nom']."</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Categorie" />
                    </form>
                    </br>
                    <?php
                }

                if(isset($_SESSION['ConnexionID'])){
                    //get the status with the book
                    $userId = $_SESSION['ConnexionID'];
                    $statut = getReaderBookStatus($conn, $userId, $bookId);
                    ?>
                    <form action="post_changeBookReader.php?bookId=<?=$book["Lvr_Id"]?>" method="post">
                        <label id="statut">Changer le statut : </label>
                        <select name="statut" id="statut" required>
                            <option value="" disabled <?php if($statut == null){echo "selected";} ?>>statu null</option>
                            <option value="a lire" <?php if($statut != null && $statut[0]["LectLivre_Type"] == "a lire"){echo "selected";} ?>>a lire</option>
                            <option value="en coure" <?php if($statut != null && $statut[0]["LectLivre_Type"] == "en coure"){echo "selected";} ?>>en coure</option>
                            <option value="fini" <?php if($statut != null && $statut[0]["LectLivre_Type"] == "fini"){echo "selected";} ?>>fini</option>
                        </select>
                        <input type="submit" value="statut" />
                    </form>
                    <?php
                }
            ?>
        </div>
     </section>
</body>