<?php
$text = $_POST['text'] ?? '';

// Save the text to a file (you can use database instead)
file_put_contents('saved_text.txt', $text);
?>
