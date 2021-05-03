<?php
// Starting session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
</head>
<body>

    <h1>Bienvenue
        <?php //si l'utilisateur est connecté
        if (isset($_SESSION['prenom'])) {
            //alors affiche son login
            echo  $_SESSION['prenom'];
        }
        ?>
    </h1>

        <?php //si l'utilisateur est connecté
        if (isset($_SESSION['prenom']))
            // echo les liens necessaire
        {
        ?>
            <input type="submit" name="deconnexion" id="deco" value="Déconnexion">
            <br>
            <a href="todolist.php">To do list</a>
            <?php
        }
        // si l'utilisateur est deconnecté
        else if (!isset($_SESSION['login']))
            // echo les liens necessaire
        {
        ?>
            <a href="login.php">Se connecter</a>
            <a href="register.php">S'inscrire</a>
        <?php
        }
        ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="api/script.js"></script>
</body>
</html>