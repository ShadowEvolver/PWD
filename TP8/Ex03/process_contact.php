<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    echo '<style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .confirmation-container {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            color: #2ecc71;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .info-box {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin: 1.5rem 0;
        }

        .info-label {
            color: #1a73e8;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .back-link {
            display: inline-block;
            background: #1a73e8;
            color: white;
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            border-radius: 8px;
            margin-top: 1rem;
            transition: background 0.3s ease;
        }

        .back-link:hover {
            background: #1557b0;
        }
    </style>';

    echo '<div class="confirmation-container">';
    echo '<h2>Merci pour votre message, ' . $nom . ' !</h2>';
    echo '<div class="info-box">';
    echo '<span class="info-label">Email :</span>' . $email;
    echo '</div>';
    echo '<div class="info-box">';
    echo '<span class="info-label">Message :</span><br>' . $message;
    echo '</div>';
    echo '<a href="index.html" class="back-link">Retour au formulaire</a>';
    echo '</div>';
} else {
    header("Location: index.html");
    exit;
}
?>