<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

echo '<style>
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .welcome-container {
        background: white;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 500px;
        width: 100%;
    }

    h2 {
        color: #2ecc71;
        margin-bottom: 1.5rem;
    }

    .logout-link {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: #1a73e8;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        margin-top: 1.5rem;
        transition: background 0.3s ease;
    }

    .logout-link:hover {
        background: #1557b0;
    }
</style>';

echo '<div class="welcome-container">';
echo '<h2>Bienvenue, ' . htmlspecialchars($_SESSION['username']) . '!</h2>';
echo '<p>Vous êtes maintenant connecté</p>';
echo '<a href="logout.php" class="logout-link">Déconnexion</a>';
echo '</div>';
?>