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
        <form action="post_addBook.php" method="post" enctype="multipart/form-data">
            <h1>Add Book</h1>
            <!-- Nom -->
                <div class="tbxInput">
                    <label id="name">name : </label>
                    <input type="text" name="name" id="name" placeholder="book name" required/>
                </div>
            <!-- Type -->
                <div class="tbxInput">
                    <label id="type">Type : </label>
                    <select name="type" id="type" required>
                        <?php
                            include_once("crud/function.php");
                            $conn = getConn();
                            $types = getBookTypes($conn);
                            print_r($types);
                            foreach($types as $type){
                                echo "<option value='".$type['Type_Id']."'>".$type['Type_Nom']."</option>";
                            }
                        ?>
                    </select>
                </div>
            <!-- Image -->
                <div class="tbxInput">
                    <label id="image">Image : </label>
                    <input type="file" name="image" id="image" accept=".jpg"/>
                </div>
            <!-- Description -->
                <div>
                    <label id="description">description : </label>
                </br>
                    <textarea type="text" name="description" id="description" placeholder="description" required></textarea>
                </div>
            <input type="submit" value="add Book" />
            </div>
        </form>
    </section>
</body>