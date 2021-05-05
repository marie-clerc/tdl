<?php
require_once('api/model.php');
session_start();

if(!isset($_SESSION['id']))
{
    header('Location: index.php') ;
}

$tache = new Model();
$id = $_SESSION['id'];
$alltasks = $tache->displaytache($id);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre to do list</title>
</head>
<body>
    <a href="index.php">Accueil</a>
    <form method="POST">
        <input type="hidden" id="id" value="<?= $_SESSION['id'] ?>">
        <input type="text" id="description" placeholder="Description" autofocus/><br/>
        <input type="button" id="addtache" value="Valider"/><br/>
    </form>

    <article id="list">
    <?php
    foreach ($alltasks as $task)
    {
    ?>
        <p><?= $task['description']?>, le  <?= $task['date']?></p>
    <?php
    }
    ?>
    </article>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="api/script.js"></script>
</body>
</html>
