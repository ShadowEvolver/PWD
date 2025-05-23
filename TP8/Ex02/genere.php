<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = (int)$_POST['length'];
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
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

        .result-container {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #1a73e8;
            margin-bottom: 1.5rem;
        }

        .password-box {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 1.5rem 0;
            word-break: break-all;
            font-family: monospace;
            font-size: 1.2rem;
            color: #2ecc71;
        }

        .new-link {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .new-link:hover {
            background: #1557b0;
        }
    </style>';

    echo '<div class="result-container">';
    echo '<h2>Votre mot de passe sécurisé</h2>';
    echo '<div class="password-box">' . htmlspecialchars($password) . '</div>';
    echo '<a href="password.html" class="new-link">Générer un autre</a>';
    echo '</div>';
}
?>