<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MyBookList Sing In</title>
    <link href="css/global.css" rel="stylesheet" />
</head>

<?php
include_once("includes/header.php")
?>
<body id="Singin">
    <form action="minichat_post.php?action=insert" method="post">
        <label id="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo"/>
        <br/>
        <label id="email">Email : </label>
        <input type="email" name="email" id="email"/>
        <br/>
        <label id="password">Mot de passe : </label>
        <input type="password" name="password" id="password"/>
        <br/>
		<input type="submit" value="Envoyer" />
    </form>
</body>