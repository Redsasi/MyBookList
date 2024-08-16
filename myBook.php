<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MyBookList</title>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/listBook.css" rel="stylesheet" />
</head>

<body>
    <?php
    include_once("includes/header.php");
    if(!isset($_SESSION['ConnexionID'])){
        header("Location: index.php");
    }
    $UserId = $_SESSION['ConnexionID'];
    include_once("crud/function.php");
    $conn = getConn();
    ?>
     <section>
     <form action="myBook.php" method="get">
        <input type="text" id="search" name="search" placeholder="Search...">
        <input type="submit" id="searchButton" value="search">
     </form>
     <div id="Library">

        <div id="Biblioteque">
            <h1>a lire</h1>
            <div id="BackGroundBiblioteque">
                <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $searchValue = $_GET['search'];
                        $books = getBooksSearchByReader($conn, $searchValue, $UserId, "a lire");
                    }else{
                        $books = getBooksByReader($conn, $UserId, "a lire");
                    }
                    foreach($books as $book){
                        echo '<a href="bookDetails.php?id='.$book["Lvr_Id"].'" class="Livre">';
                        if(empty($book["Lvr_Image"])){
                            echo '<img src="images/BaseBookImage.jpg" alt="'.$book["Lvr_Nom"].'">';
                        }else{
                            echo '<img src="data:image/jpg;base64,'.base64_encode($book["Lvr_Image"]).'" alt="'.$book["Lvr_Nom"].'">';
                        }
                        echo "<p>".$book['Lvr_Nom']."</p>";
                        echo "</a>";
                    }
                ?>
            </div>
        </div>
        <div id="Biblioteque">
        <h1>en coure</h1>
            <div id="BackGroundBiblioteque">
                <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $searchValue = $_GET['search'];
                        $books = getBooksSearchByReader($conn, $searchValue, $UserId, "en coure");
                    }else{
                        $books = getBooksByReader($conn, $UserId, "en coure");
                    }
                    foreach($books as $book){
                        echo '<a href="bookDetails.php?id='.$book["Lvr_Id"].'" class="Livre">';
                        if(empty($book["Lvr_Image"])){
                            echo '<img src="images/BaseBookImage.jpg" alt="'.$book["Lvr_Nom"].'">';
                        }else{
                            echo '<img src="data:image/jpg;base64,'.base64_encode($book["Lvr_Image"]).'" alt="'.$book["Lvr_Nom"].'">';
                        }
                        echo "<p>".$book['Lvr_Nom']."</p>";
                        echo "</a>";
                    }
                ?>
            </div>
        </div>
        <div id="Biblioteque">
            <h1>fini</h1>
            <div id="BackGroundBiblioteque">
                <?php
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $searchValue = $_GET['search'];
                        $books = getBooksSearchByReader($conn, $searchValue, $UserId, "fini");
                    }else{
                        $books = getBooksByReader($conn, $UserId, "fini");
                    }
                    foreach($books as $book){
                        echo '<a href="bookDetails.php?id='.$book["Lvr_Id"].'" class="Livre">';
                        if(empty($book["Lvr_Image"])){
                            echo '<img src="images/BaseBookImage.jpg" alt="'.$book["Lvr_Nom"].'">';
                        }else{
                            echo '<img src="data:image/jpg;base64,'.base64_encode($book["Lvr_Image"]).'" alt="'.$book["Lvr_Nom"].'">';
                        }
                        echo "<p>".$book['Lvr_Nom']."</p>";
                        echo "</a>";
                    }
                ?>
            </div>
        </div>
     </div>
     </section>
</body>