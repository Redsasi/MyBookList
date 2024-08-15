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
        <section>
            <h1>Carte MyBookList</h1>
            <form action="minichat_post.php?action=insert" method="post">
                <img id="baseProfilePic" src="images/BaseProfilePicture.jpg"/>
                <div class="profileInput">
                    <div class="tbxInput">
                        <label id="pseudo">Pseudo : </label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Username"/>
                    </div>
                    <div class="tbxInput">
                        <label id="email">Email : </label>
                        <input type="email" name="email" id="email" placeholder="MyEmail@gmail.com"/>
                    </div>
                    <div class="tbxInput">
                        <label id="password">Mot de passe : </label>
                        <input type="password" name="password" id="password"/>
                    </div>
                <input class="btnSignUp" type="submit" value="Sign Up" />
                </div>
            </form>
        </section>
    </body>
</html>