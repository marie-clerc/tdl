<?php
require_once('model.php');
$tache = new Model();

$id = trim(htmlspecialchars($_POST['id']));

$tache->updatetache($id);
