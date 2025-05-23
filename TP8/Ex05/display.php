<?php
$messages_file = 'messages.txt';

echo '<style>
    .message-card {
        background: white;
        padding: 2rem;
        margin-bottom: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .message-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.9em;
        color: #636e72;
    }

    .message-author {
        color: var(--primary-color);
        font-weight: 600;
    }

    .message-date {
        color: #74b9ff;
    }

    .message-content {
        color: var(--text-color);
        line-height: 1.6;
        white-space: pre-wrap;
    }

    .empty-state {
        text-align: center;
        padding: 2rem;
        color: #636e72;
        background: white;
        border-radius: 12px;
    }
</style>';

if (file_exists($messages_file)) {
    $messages = @file($messages_file, FILE_IGNORE_NEW_LINES);
    if ($messages === false) {
        echo '<div class="empty-state">Impossible de charger les messages</div>';
        exit;
    }
} else {
    $messages = [];
}

if (!empty($messages)) {
    foreach (array_reverse($messages) as $message) {
        $parts = explode(' - ', $message, 2);
        $date = array_shift($parts);
        list($name, $content) = explode(': ', implode(' - ', $parts), 2);
        
        echo '<div class="message-card">';
        echo '<div class="message-meta">';
        echo '<span class="message-author">' . htmlspecialchars($name) . '</span>';
        echo '<span class="message-date">' . htmlspecialchars($date) . '</span>';
        echo '</div>';
        echo '<div class="message-content">' . nl2br(htmlspecialchars($content)) . '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="empty-state">Soyez le premier à laisser un message !</div>';
}
?>