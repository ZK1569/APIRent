<?php

require_once __DIR__.'\config.php';

$conn = new Connect();

$id = $_GET["id"];

$data = $conn->prepare('DELETE FROM `logement` WHERE `logement`.`id` = ?');
$data->execute(
    array($id)
    );