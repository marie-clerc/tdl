<?php
    require_once('user.php');
    $user = new User();

    $nom = trim(htmlspecialchars($_POST['name']));
    $prename = trim(htmlspecialchars($_POST['prename']));
    $mail = trim(htmlspecialchars($_POST['mail']));
    $pass = trim(htmlspecialchars($_POST['password']));

    $user->register($nom, $prename, $mail, $pass);
?>