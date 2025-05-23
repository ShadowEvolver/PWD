<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="confirmation-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $civilite = isset($_POST['civilite']) ? strip_tags($_POST['civilite']) : '';
            $nom = isset($_POST['nom']) ? strip_tags($_POST['nom']) : '';
            $prenom = isset($_POST['prenom']) ? strip_tags($_POST['prenom']) : '';
            $email = isset($_POST['email']) ? strip_tags($_POST['email']) : '';
            $naissance = isset($_POST['naissance']) ? strip_tags($_POST['naissance']) : '';
            $telephone = isset($_POST['telephone']) ? strip_tags($_POST['telephone']) : '';
            $adresse = isset($_POST['adresse']) ? strip_tags($_POST['adresse']) : '';
            $sport = isset($_POST['sport']) ? strip_tags($_POST['sport']) : '';
            $niveau = isset($_POST['niveau']) ? strip_tags($_POST['niveau']) : '';
            $jours = isset($_POST['jours']) ? $_POST['jours'] : [];
            $message = isset($_POST['message']) ? strip_tags($_POST['message']) : '';
            
            $civilites = [
                'M' => 'Monsieur',
                'Mme' => 'Madame',
                'Mlle' => 'Mademoiselle'
            ];
            
            $niveaux = [
                'debutant' => 'Débutant',
                'intermediaire' => 'Intermédiaire',
                'avance' => 'Avancé',
                'competition' => 'Compétition'
            ];
            
            $sports = [
                'football' => 'Football',
                'basketball' => 'Basketball',
                'tennis' => 'Tennis',
                'natation' => 'Natation',
                'athletisme' => 'Athlétisme',
                'autre' => 'Autre'
            ];
            
            $joursSemaine = [
                'lundi' => 'Lundi',
                'mardi' => 'Mardi',
                'mercredi' => 'Mercredi',
                'jeudi' => 'Jeudi',
                'vendredi' => 'Vendredi',
                'samedi' => 'Samedi'
            ];
            
            $dateNaissance = date('d/m/Y', strtotime($naissance));

            $joursPropres = [];
            foreach ($jours as $jour) {
                $joursPropres[] = strip_tags($jour);
            }
            $joursAffiches = array_map(function($j) use ($joursSemaine) {
                return $joursSemaine[$j] ?? $j;
            }, $joursPropres);
            ?>
            
            <h1>Confirmation d'inscription</h1>
            
            <div class="success-message">
                Merci <?php echo htmlspecialchars($civilites[$civilite] ?? ''); ?> <?php echo htmlspecialchars($prenom); ?> <?php echo htmlspecialchars($nom); ?> pour votre inscription !
            </div>
            
            <h2>Récapitulatif de vos informations :</h2>
            
            <div class="info-group">
                <span class="info-label">Civilité :</span>
                <?php echo htmlspecialchars($civilites[$civilite] ?? ''); ?>
            </div>
            
            <div class="info-group">
                <span class="info-label">Nom complet :</span>
                <?php echo htmlspecialchars($prenom . ' ' . $nom); ?>
            </div>
            
            <div class="info-group">
                <span class="info-label">Email :</span>
                <?php echo htmlspecialchars($email); ?>
            </div>
            
            <div class="info-group">
                <span class="info-label">Date de naissance :</span>
                <?php echo htmlspecialchars($dateNaissance); ?>
            </div>
            
            <?php if (!empty($telephone)): ?>
            <div class="info-group">
                <span class="info-label">Téléphone :</span>
                <?php echo htmlspecialchars($telephone); ?>
            </div>
            <?php endif; ?>
            
            <?php if (!empty($adresse)): ?>
            <div class="info-group">
                <span class="info-label">Adresse :</span>
                <?php echo nl2br(htmlspecialchars($adresse)); ?>
            </div>
            <?php endif; ?>
            
            <div class="info-group">
                <span class="info-label">Sport préféré :</span>
                <?php echo htmlspecialchars($sports[$sport] ?? $sport); ?>
            </div>
            
            <div class="info-group">
                <span class="info-label">Niveau :</span>
                <?php echo htmlspecialchars($niveaux[$niveau] ?? $niveau); ?>
            </div>
            
            <div class="info-group">
                <span class="info-label">Disponibilités :</span>
                <?php echo !empty($joursAffiches) ? implode(', ', $joursAffiches) : 'Aucun jour sélectionné'; ?>
            </div>
            
            <?php if (!empty($message)): ?>
            <div class="info-group">
                <span class="info-label">Votre message :</span>
                <?php echo nl2br(htmlspecialchars($message)); ?>
            </div>
            <?php endif; ?>
            
            <div class="info-group">
                <p>Nous vous contacterons bientôt pour finaliser votre inscription et vous informer des créneaux disponibles.</p>
            </div>
            
            <?php
        } else {
            echo '<h1>Erreur</h1>';
            echo '<p>Cette page ne peut être accédée directement. Veuillez remplir le formulaire d\'inscription.</p>';
        }
        ?>
    </div>
</body>
</html>