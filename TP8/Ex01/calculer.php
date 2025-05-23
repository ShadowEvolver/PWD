<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = (float)$_POST['num1'];
    $num2 = (float)$_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;
    $isError = false;

    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = $num2 != 0 ? $num1 / $num2 : "Erreur: Division par zéro";
            $isError = $num2 == 0;
            break;
    }

    echo '<style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .result-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 40px;
            text-align: center;
        }

        .result {
            font-size: 24px;
            color: '.($isError ? '#e74c3c' : '#2ecc71').';
            margin: 20px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .back-link {
            display: inline-block;
            padding: 12px 25px;
            background-color: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #1557b0;
        }
    </style>';

    echo '<div class="result-container">';
    echo '<h3 style="color: #1a73e8;">Résultat du calcul</h3>';
    echo '<div class="result">';
    echo "$num1 $operation $num2 = $result";
    echo '</div>';
    echo '<a href="calculatrice.html" class="back-link">Nouveau calcul</a>';
    echo '</div>';
}
?>