<?php
require_once('api/model.php');
session_start();
if(!isset($_SESSION['id'])) { header('Location: index.php'); }
$tache = new Model();
$id = $_SESSION['id'];
$alltasks = $tache->displaytache($id);
$alldone = $tache->displaytachedone($id);
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
        <h2>TO DO</h2>
    <?php
    foreach ($alltasks as $task)
    {
    ?>
        <!--<input type="hidden" id="idtask" value="<?= $task['id'] ?>">-->
        <p><?= $task['description']?>, le  <?= $task['date']?>
            [<span class="done" data-id="<?= $task['id'] ?>">Terminer</span>]
            |
            [<span class="suppr" data-id="<?= $task['id'] ?>">Supprimer</span>]
        </p>

    <?php
    }
    ?>
    </article>


    <?php
    if ($alldone>0) {
    ?>
        <article id="tache_termine">
        <h2>DONE</h2>
        <?php
        foreach ($alldone as $done)
        {
        ?>
            <p>
                <?= $done['description']?>, le  <?= $done['date']?>
                [<span class="suppr" data-id="<?= $done['id'] ?>">Supprimer</span>]
            </p>
        <?php
        }
        ?>
    </article>
    <?php
    }
    ?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="api/script.js"></script>
</body>
</html>
