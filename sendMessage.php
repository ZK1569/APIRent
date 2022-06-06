<?php

require_once __DIR__.'\config.php';

$conn = new Connect();

$from = $_POST['from'];
$to = $_POST['to'];
$message = $_POST['message'];

$data = $conn->prepare('INSERT INTO message (message_from, message_to, message_text) VALUES (?,?,?)');
$data->execute(
    array($from, $to, $message)
    );