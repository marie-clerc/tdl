<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
</head>
<body>
    <a href="login.php">Se connecter</a>
    <a href="register.php">S'inscrire</a>
    <?php
    var_dump($_SESSION['user']);
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="api/script.js"></script>
</body>
</html>