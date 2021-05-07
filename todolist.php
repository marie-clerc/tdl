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
    <link href="style/todo.css" rel="stylesheet">
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
        <p class="tache"><?= $task['description']?>
            <section class="date">
                le  <?= $task['date']?>
                [<span class="done" data-id="<?= $task['id'] ?>">&#10004;</span>]
                |
                [<span class="suppr" data-id="<?= $task['id'] ?>">&#10006;</span>]
            </section>
        </p>

    <?php
    }
    ?>
    </article>


    <article id="tache_termine">
        <h2>DONE</h2>
        <?php
        foreach ($alldone as $done)
        {
        ?>
            <p class="tache"><?= $done['description']?>
            <section class="date">
                le  <?= $done['finish']?>
                    [<span class="suppr" data-id="<?= $done['id'] ?>">&#10006;</span>]
                </section>
            </p>
        <?php
        }
        ?>
    </article>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="api/script.js"></script>
</body>
</html>
