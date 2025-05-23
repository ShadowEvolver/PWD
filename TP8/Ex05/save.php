<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $date = date('d/m/Y H:i:s');
    
    $entry = "$date - $name: $message\n";
    file_put_contents('messages.txt', $entry, FILE_APPEND);
    
    header("Location: index.php");
}
?>