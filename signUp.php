<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>MyBookList Sing In</title>
        <link href="css/global.css" rel="stylesheet" />
        <link href="css/sign.css" rel="stylesheet" />
    </head>

    <body>
        <?php
            include_once("includes/header.php")
        ?>
        <?php
        if(isset($_GET["EmailUsed"])){
           echo "<h2 id='errorEmail'>Email already used</h2>";
        }
        ?>
        <section>
            <h1>Carte MyBookList</h1>
            <form action="signUp_post.php" method="post">
                <img id="baseProfilePic" src="images/BaseProfilePicture.jpg"/>
                <div class="profileInput">
                    <div class="tbxInput">
                        <label id="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Username" required/>
                    </div>
                    <div class="tbxInput">
                        <label id="email">Email : </label>
                        <input type="email" name="email" id="email" placeholder="MyEmail@gmail.com" required/>
                    </div>
                    <div class="tbxInput">
                        <label id="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" required/>
                    </div>
                <input class="btnSignUp" type="submit" value="Sign Up" />
                </div>
            </form>
        </section>
    </body>
</html>