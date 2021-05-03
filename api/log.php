<?php
    require_once('model.php');
    $user = new Model();

    session_start();

    $mail = trim(htmlspecialchars($_POST['mail']));
    $pass = trim(htmlspecialchars($_POST['password']));

    $data = $user->login($mail, $pass);

    echo $data;
?>