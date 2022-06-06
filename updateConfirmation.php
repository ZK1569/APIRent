<?php

require_once __DIR__ . '\config.php';

$id = $_GET["id"];


$db = new Connect();
$data = $db->prepare('update reservation set confirmed=1 where id= ?');
$data->execute(
    array($id)
);
