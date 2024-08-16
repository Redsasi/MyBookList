<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MyBookList</title>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/addBook.css" rel="stylesheet" />
</head>

<body>
    <?php
    include_once("includes/header.php");
    //if not admin exclude return to index page
    if(!(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)){
        header("Location: index.php");
    }

    ?>
    <section>
        <form action="post_addBookType.php" method="post">
        <h1>Add Book Type</h1>
            <!-- Nom -->
                <div class="tbxInput">
                    <label id="name">name : </label>
                    <input type="text" name="name" id="name" placeholder="Type name" required/>
                </div>
            <!-- Description -->
                <div>
                    <label id="description">description : </label>
                </br>
                    <textarea type="text" name="description" id="description" placeholder="description" required></textarea>
                </div>
            <input type="submit" value="add Type" />
            </div>
        </form>
    </section>
</body>