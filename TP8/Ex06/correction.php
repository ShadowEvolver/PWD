<?php
$answers = [
    'q1' => 'b',
    'q2' => 'c',
    'q3' => 'b'
];
$score = 0;

echo '<style>
    :root {
        --primary-color: #1a73e8;
        --correct-color: #2ecc71;
        --incorrect-color: #e74c3c;
        --background-color: #f8f9fa;
    }

    body {
        font-family: "Segoe UI", system-ui;
        background: var(--background-color);
        margin: 0;
        padding: 2rem;
        min-height: 100vh;
    }

    .result-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        padding: 2.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    h2 {
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 2rem;
    }

    .question-result {
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        background: #f8f9fa;
    }

    .correct {
        border-left: 4px solid var(--correct-color);
    }

    .incorrect {
        border-left: 4px solid var(--incorrect-color);
    }

    .score-box {
        text-align: center;
        padding: 1.5rem;
        background: var(--primary-color);
        color: white;
        border-radius: 8px;
        margin: 2rem 0;
    }

    .retry-button {
        display: inline-block;
        padding: 1rem 2rem;
        background: var(--correct-color);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.3s ease;
    }

    .retry-button:hover {
        background: #27ae60;
    }

    .icon {
        width: 24px;
        height: 24px;
        margin-right: 0.8rem;
    }
</style>';

echo '<div class="result-container">';
echo '<h2>Résultats du Quiz</h2>';

foreach ($answers as $question => $correct) {
    $user_answer = $_POST[$question] ?? '';
    $is_correct = ($user_answer === $correct);
    $question_number = substr($question, 1);
    
    if ($is_correct) $score++;

    echo '<div class="question-result ' . ($is_correct ? 'correct' : 'incorrect') . '">';
    echo '<h3>Question ' . $question_number . '</h3>';
    echo '<p>';
    echo $is_correct 
    ? '<svg class="icon" viewBox="0 0 24 24"><path fill="#2ecc71" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"/></svg>'
    : '<svg class="icon" viewBox="0 0 24 24"><path fill="#e74c3c" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"/></svg>';
    echo $is_correct 
        ? 'Bonne réponse !'
        : 'Votre réponse : ' . htmlspecialchars($user_answer) . ' (Correct : ' . htmlspecialchars($correct) . ')';
    
    echo '</p></div>';
}

echo '<div class="score-box">';
echo '<h3>Score Final</h3>';
echo '<p>' . $score . '/' . count($answers) . '</p>';
echo '</div>';

echo '<center><a href="quiz.html" class="retry-button">Recommencer le quiz</a></center>';
echo '</div>';
?>