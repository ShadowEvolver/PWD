<?php
$pdo = new PDO('mysql:host=localhost;dbname=TP10', 'root', '');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date = $_POST['date'];
    $stmt = $pdo->prepare("INSERT INTO exercice (titre, auteur, date_creation) VALUES (?, ?, ?)");
    if ($stmt->execute([$titre, $auteur, $date])) {
        header("Location: index.php?message=L'exercice a été ajouté avec succès");
    } else {
        header("Location: index.php?message=Erreur lors de l'ajout");
    }
}
?>