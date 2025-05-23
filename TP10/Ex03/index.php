<?php

session_start();
$message = '';
$conn = new mysqli('localhost', 'root', '', 'TP10');

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    
    $check = $conn->prepare("SELECT id FROM guerrier WHERE nom = ?");
    $check->bind_param("s", $nom);
    $check->execute();
    $result = $check->get_result();
    
    if ($result->num_rows > 0) {
        $message = "Ce nom est déjà pris";
    } else {
        $stmt = $conn->prepare("INSERT INTO guerrier (nom) VALUES (?)");
        $stmt->bind_param("s", $nom);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Guerrier créé avec succès";
            header("Location: " . $_SERVER['PHP_SELF']); 
            exit();
        } else {
            $message = "Erreur lors de la création : " . $conn->error;
        }
    }
}

if (isset($_GET['frapper']) && isset($_GET['attaquant'])) {
    $id_victime = (int)$_GET['frapper'];
    $id_attaquant = (int)$_GET['attaquant'];
    
    $stmt = $conn->prepare("UPDATE guerrier SET degats = degats + 5 WHERE id = ?");
    $stmt->bind_param("i", $id_victime);
    
    if ($stmt->execute()) {
        $check_vie = $conn->prepare("SELECT degats FROM guerrier WHERE id = ?");
        $check_vie->bind_param("i", $id_victime);
        $check_vie->execute();
        $result = $check_vie->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['degats'] >= 100) {
            $del = $conn->prepare("DELETE FROM guerrier WHERE id = ?");
            $del->bind_param("i", $id_victime);
            $del->execute();
            $message = "Le guerrier a été éliminé !";
        } else {
            $message = "Le guerrier a été frappé !";
        }
    }
}

$guerriers = $conn->query("SELECT * FROM guerrier");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu de combat</title>
    <style>
        table { border-collapse: collapse; }
        td, th { padding: 8px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    
    <h2>Créer un guerrier</h2>
    <form method="post">
        Nom: <input type="text" name="nom" required>
        <input type="submit" value="Créer">
    </form>
    
    <h2>Liste des guerriers</h2>
    <?php if ($guerriers->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Dégâts</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $guerriers->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nom']) ?></td>
            <td><?= htmlspecialchars($row['degats']) ?>%</td>
            <td>
                <form method="get">
                    <input type="hidden" name="attaquant" value="<?= $row['id'] ?>">
                    <select name="frapper">
                        <?php 
                        $autres = $conn->query("SELECT id, nom FROM guerrier WHERE id != " . $row['id']);
                        while ($autre = $autres->fetch_assoc()):
                        ?>
                        <option value="<?= $autre['id'] ?>"><?= htmlspecialchars($autre['nom']) ?></option>
                        <?php endwhile; ?>
                    </select>
                    <input type="submit" value="Frapper">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>Aucun guerrier enregistré</p>
    <?php endif; ?>
</body>
</html>

<?php 
$conn->close();
?>