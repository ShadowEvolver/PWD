<?php
session_start();
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php
    if ($error == 1) echo "<p style='color:red'>Veuillez saisir un login et un mot de passe</p>";
    if ($error == 2) echo "<p style='color:red'>Erreur de login/mot de passe</p>";
    if ($error == 3) echo "<p style='color:green'>Vous avez été déconnecté du service</p>";
    ?>
    <form action="validation.php" method="post">
        <label for="login">login</label>
        <input type="text" name="login"><br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password"><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>