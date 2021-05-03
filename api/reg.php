<?php
    require_once('model.php');
    $user = new Model();

    $nom = trim(htmlspecialchars($_POST['name']));
    $prenom = trim(htmlspecialchars($_POST['prename']));
    $mail = trim(htmlspecialchars($_POST['mail']));
    $pass = trim(htmlspecialchars($_POST['password']));

    $user->register($nom, $prenom, $mail, $pass);
?>