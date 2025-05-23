<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=TP10', 'root', '');
$message = $_GET['message'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestion des exercices</title>
</head>
<body>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <h2>Ajouter un exercice</h2>
    <form action="ajouter.php" method="post">
        <label for="titre">Titre de l'exercice</label>
        <input type="text" name="titre" required><br>
        <label for="auteur">Auteur de l'exercice</label>
        <input type="text" name="auteur" required><br>
        <label for="date">Date de création</label>
        <input type="date" name="date" required><br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Liste des exercices</h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>titre</th>
            <th>auteur</th>
            <th>date</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM exercice");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['titre']}</td>
                <td>{$row['auteur']}</td>
                <td>{$row['date_creation']}</td>
                <td>
                    <a href='modifier.php?id={$row['id']}'>Modifier</a>
                    <a href='supprimer.php?id={$row['id']}' onclick='return confirm(\"Confirmer la suppression ?\")'>Supprimer</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>