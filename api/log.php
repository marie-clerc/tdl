<?php
    require_once('user.php');
    $user = new User();

    $mail = trim(htmlspecialchars($_POST['mail']));
    $pass = trim(htmlspecialchars($_POST['password']));

    $data = $user->login($mail, $pass);

    echo $data;
?>