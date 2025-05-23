<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réponse alternative</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="ico.png">
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <?php
        $titre = strip_tags($_POST['titre'] ?? '');
        $nom = strip_tags($_POST['nom'] ?? '');
        $prenom = strip_tags($_POST['prenom'] ?? '');
        $annee = strip_tags($_POST['annee'] ?? '');
        $identifiant = strip_tags($_POST['identifiant'] ?? '');
        $mdp = strip_tags($_POST['mdp'] ?? '');
        $sexe = strip_tags($_POST['sexe'] ?? '');
        ?>
        
        <h1>Bonjour <?php echo $titre; ?> <?php echo $prenom; ?> <?php echo $nom; ?></h1>
        <p><strong>Identifiant :</strong> <?php echo $identifiant; ?></p>
        <p><strong>Mot de passe :</strong> <?php echo $mdp; ?></p>
        <p><strong>Année de naissance :</strong> <?php echo $annee; ?></p>
        <p><strong>Sexe :</strong> <?php echo ($sexe === 'M' ? 'Masculin' : 'Féminin'); ?></p>
        
        <?php if (isset($_POST['debutant'])): ?>
            <p>Comme vous êtes débutant<?php echo ($sexe === 'F' ? 'e' : ''); ?>, 
            c'est une bonne idée de commencer à apprendre le PHP !</p>
        <?php endif; ?>
        
        <?php if (!empty($annee)): ?>
            <h2>Faits historiques de <?php echo $annee; ?> :</h2>
            <iframe src="https://fr.wikipedia.org/wiki/<?php echo $annee; ?>" 
                    width="100%" height="500px"></iframe>
        <?php endif; ?>
        
    <?php else: ?>
        <h1>Erreur : Cette page doit être appelée via un formulaire POST</h1>
    <?php endif; ?>
</body>
</html>