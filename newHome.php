<?php

require_once __DIR__.'\config.php';

$img = $_GET["img"];
$titre = $_GET["titre"];
$type = $_GET["type"];
$adresse = $_GET["adresse"];
$nombreVoyageur = $_GET["nombreVoyageur"];
$nombreLit = $_GET["nombreLit"];
$prix = $_GET["prix"];
$code = $_GET["code"];

$db = new Connect();
$data = $db->prepare('INSERT INTO `logement`(`main_picture`, `name`, `type`, `localisation`, `voyageur_max`, `price`, `code`) VALUES (?,?,?,?,?,?,?)');
$data->execute(
    array($img, $titre, $type, $adresse, $nombreVoyageur, $prix, $code)
    );