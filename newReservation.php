<?php

require_once __DIR__ . '\config.php';

$conn = new Connect();

$user = $_POST['user'];
$logement_id = $_POST['logement_id'];
$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];
$confirmed = $_POST['confirmed'];
$frais = $_POST['frais'];
$price_owner = $_POST['price_owner'];


$data = $conn->prepare('INSERT INTO `reservation`(`user_id`, `logement_id`, `date_from`, `date_to`, `confirmed`, `frais`, `price_owner`) VALUES (?,?,?,?,?,?,?)');
$data->execute(
    array($user, $logement_id, $date_from, $date_to, $confirmed, $frais, $price_owner)
);
