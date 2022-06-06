<?php

require_once __DIR__.'\config.php';

$name = $_GET["name"];
$firstname = $_GET["firstname"];
$mail = $_GET["mail"];
$password = $_GET["password"];
$phone = $_GET["phone"];

$db = new Connect();
$data = $db->prepare('INSERT INTO `user`(`name`, `firstname`, `mail`, `password`, `phone`) VALUES (?,?,?,?,?)');
$data->execute(
    array($name, $firstname, $mail, $password, $phone)
    );