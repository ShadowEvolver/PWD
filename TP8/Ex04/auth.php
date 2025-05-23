<?php
session_start();

$valid_username = "taha";
$valid_password = "Taha@2025";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
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
            
            .error-container {
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
                max-width: 400px;
                width: 100%;
            }
            
            .error-message {
                color: #e74c3c;
                margin-bottom: 1.5rem;
            }
            
            .retry-link {
                display: inline-block;
                padding: 0.8rem 1.5rem;
                background: #1a73e8;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                transition: background 0.3s ease;
            }
            
            .retry-link:hover {
                background: #1557b0;
            }
        </style>';
        
        echo '<div class="error-container">';
        echo '<p class="error-message">Identifiants incorrects</p>';
        echo '<a href="login.html" class="retry-link">Réessayer</a>';
        echo '</div>';
    }
}
?>