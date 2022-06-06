<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT * FROM USER');
        $data->execute();
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'name'=>$contact["name"],
                'firstname'=>$contact["firstname"],
                'mail'=>$contact["mail"],
            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();