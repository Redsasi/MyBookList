<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="css/header.css" rel="stylesheet" />
    </head>
    <header>
        <nav>
            <ul>
                <li><a id="icone" href="index.php"><img src="images/Icone.png"/></a></li>
                <?php
                    session_start();
                    echo '<li><a href="#">Search books</a></li>';// tous le temps disponible même sans connection
                    if(isset($_SESSION['ConnexionID'])){// uniquement quand connecter
                        echo '<li><a href="#">My Books</a></li>';
                    }
                    if(isset($_SESSION['isAdmin'])){// uniquement quand connecter et a les droit admin
                        echo '<li><a href="#">Add Books</a></li>';
                    }
                    if(!isset($_SESSION['ConnexionID'])){// uniquement quand non connecter
                        echo '<li><a href="login.php">Login</a></li>'; 
                        echo '<li><a href="signUp.php">Sign Up</a></li>';
                    }
                    if(isset($_SESSION['ConnexionID'])){// uniquement quand déjà connecter
                        echo '<li><a href="logout.php">Logout</a></li>';
                    }
                ?>
            </ul>
        </nav>
    </header>
</html>