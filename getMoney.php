<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT reservation.price_owner, reservation.logement_id,logement.name, user.id FROM reservation inner join logement inner join user WHERE reservation.logement_id = logement.id and logement.owner = user.id and user.id = ?');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'name'=>$contact["name"],
                'price_owner'=>$contact["price_owner"],

            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();