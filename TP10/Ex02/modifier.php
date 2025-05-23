<?php
$pdo = new PDO('mysql:host=localhost;dbname=TP10', 'root', '');
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $date = $_POST['date'];
    $stmt = $pdo->prepare("UPDATE exercice SET titre=?, auteur=?, date_creation=? WHERE id=?");
    if ($stmt->execute([$titre, $auteur, $date, $id])) {
        header("Location: index.php?message=Modification réussie");
    } else {
        header("Location: index.php?message=Erreur de modification");
    }
}

$stmt = $pdo->prepare("SELECT * FROM exercice WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier</title>
</head>
<body>
    <h2>Modifier un exercice</h2>
    <form method="post">
        <label for="titre">Titre de l'exercice</label>
        <input type="text" name="titre" value="<?php echo $row['titre']; ?>" required><br>
        <label for="auteur">Auteur de l'exercice</label>
        <input type="text" name="auteur" value="<?php echo $row['auteur']; ?>" required><br>
        <label for="date">Date de création</label>
        <input type="date" name="date" value="<?php echo $row['date_creation']; ?>" required><br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>