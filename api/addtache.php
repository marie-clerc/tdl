<?php
    require_once('model.php');
    $tache = new Model();

    $id = trim(htmlspecialchars($_POST['id']));
    $description = trim(htmlspecialchars($_POST['description']));

    $tache->addtache($id, $description);
?>