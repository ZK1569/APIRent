<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT name, firstname FROM USER WHERE id=?');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
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