<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $from = $_GET["from"];
        $to = $_GET["to"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT message.`id`,`message_to`,`message_text`, user.name as message_from from message inner join user on message.message_from = user.id where message_from = ? and message_to = ? or message_from = ? and message_to = ?');
        $data->execute(
            array($from, $to, $to, $from)
        );
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'id'=>$contact["id"],
                'to'=>$contact["message_to"],
                'from'=>$contact["message_from"],
                'text'=>$contact["message_text"],
            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();