<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'Or</title>
    <style>
        :root {
            --primary-color: #1a73e8;
            --background-color: #f8f9fa;
            --text-color: #2d3436;
        }

        body {
            font-family: 'Segoe UI', system-ui;
            background: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }

        .guestbook-form {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        input, textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            background: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s ease;
            width: 100%;
        }

        button:hover {
            background: #1557b0;
        }

        .messages-header {
            text-align: center;
            margin: 3rem 0 2rem;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Livre d'Or</h2>
        
        <div class="guestbook-form">
            <form action="save.php" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Votre message..." required></textarea>
                </div>
                <button type="submit">Publier le message</button>
            </form>
        </div>

        <h3 class="messages-header">Messages des visiteurs</h3>
        <?php include 'display.php'; ?>
    </div>
</body>
</html>