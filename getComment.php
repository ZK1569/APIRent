<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT commentaire.id, commentaire.logement_id, commentaire.user_id, user.name, user.firstname, commentaire.comment FROM COMMENTAIRE INNER JOIN USER ON COMMENTAIRE.user_id = USER.id WHERE logement_id = ?');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'id'=>$contact["id"],
                'logement_id'=>$contact["logement_id"],
                'user_id'=>$contact["user_id"],
                'comment'=>$contact["comment"],
                'name'=>$contact["name"],
                'firstname'=>$contact["firstname"],

            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();