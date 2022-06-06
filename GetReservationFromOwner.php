<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT reservation.id, reservation.user_id , reservation.date_from, reservation.date_to, reservation.price_owner, reservation.confirmed, user.name, user.firstname, logement.id as logement_id, logement.name as logement_name, logement.owner FROM reservation INNER JOIN logement INNER JOIN user where user.id = reservation.user_id and reservation.logement_id = logement.id and reservation.confirmed = 0 and logement.owner = ?');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'id'=>$contact["id"],
                'user_id'=>$contact["user_id"],
                'date_from'=>$contact["date_from"],
                'date_to'=>$contact["date_to"],
                'name'=>$contact["name"],
                'firstname'=>$contact["firstname"],
                'logement_id'=>$contact["logement_id"],
                'logement_name'=>$contact["logement_name"],
                'price_owner'=>$contact["price_owner"],
                'owner'=>$contact["owner"],
            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();