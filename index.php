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
    include_once("includes/header.php")
    ?>
     <section>
     <form action="index.php" method="get">
        <input type="text" id="search" name="search" placeholder="Search...">
        <input type="submit" id="searchButton" value="search">
     </form>
        <div id="Biblioteque" style="height:90%;">
            <div id="BackGroundBiblioteque">
                <?php
                    include_once("crud/function.php");
                    $conn = getConn();
                    if(isset($_GET['search']) && !empty($_GET['search'])){
                        $searchValue = $_GET['search'];
                        $books = getBooksSearch($conn, $searchValue);
                    }else{
                        $books = getBooks($conn);
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
     </section>
</body>