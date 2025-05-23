<?php
session_start();
require 'config.php';

if (isset($_GET['afaire'])) {
    if ($_GET['afaire'] === 'deconnexion') {
        session_destroy();
        header("Location: login.php?error=3");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        header("Location: login.php?error=1");
        exit();
    }

    if ($login === USERLOGIN && $password === USERPASS) {
        $_SESSION['CONNECT'] = 'OK';
        $_SESSION['login'] = $login;
        header("Location: accueil.php");
        exit();
    } else {
        header("Location: login.php?error=2");
        exit();
    }
}
?>