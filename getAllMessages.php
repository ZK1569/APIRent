<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('select message.id, message_to, message_from, message_text, user.name, user.firstname from message INNER join user where message_from = ? and user.id = message_to GROUP BY message_to');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'id'=>$contact["id"],
                'to'=>$contact["message_to"],
                'from'=>$contact["message_from"],
                'text'=>$contact["message_text"],
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