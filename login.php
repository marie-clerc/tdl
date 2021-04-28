<?php
// Starting session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <a href="index.php">Accueil</a>
    <a href="register.php">S'inscrire</a>
    <br/>
    <br/>
    <form method="POST">
        <input type="email" id="mail" placeholder="Adresse email" autofocus/><br/>
        <input type="password" id="password" placeholder="Mot de passe"/><br/>
        <input type="button" id="login" value="Connexion"/>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="api/script.js"></script>
</body>
</html>