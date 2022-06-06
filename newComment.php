<?php

require_once __DIR__.'\config.php';

$conn = new Connect();

$logement_id = $_POST['logement_id'];
$user_id = $_POST['user_id'];
$comment = $_POST['comment'];

$data = $conn->prepare('INSERT INTO commentaire (logement_id, user_id, comment) VALUES (?,?,?)');
$data->execute(
    array($logement_id, $user_id, $comment)
    );