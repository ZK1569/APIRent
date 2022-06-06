<?php

require_once __DIR__.'\config.php';

$conn = new Connect();

$id = $_POST["id"];
$owner = $_POST['owner'];
$img = $_POST['img'];
$titre = $_POST['titre'];
$type = $_POST['type'];
$adresse = $_POST['adresse'];
$nbr_voyageur = $_POST['nbr_voyageur'];
$nbr_lit = $_POST['nbr_lit'];
$prix = $_POST['prix'];
$code = $_POST['code'];
$description = $_POST['description'];

$data = $conn->prepare('UPDATE `logement` SET `main_picture`=?, `name`=?, `type`=?, `localisation`=?, `voyageur_max`=?, `price`=?, `code`=?, `short_description`=? WHERE id=?');
$data->execute(
    array($img, $titre, $type, $adresse, $nbr_voyageur, $prix, $code, $description, $id)
    );