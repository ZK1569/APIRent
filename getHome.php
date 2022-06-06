<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT id, name, type, price, voyageur_max, note, localisation, short_description, main_picture FROM LOGEMENT');
        $data->execute();
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'id'=>$contact["id"],
                'name'=>$contact["name"],
                'type'=>$contact["type"],
                'price'=>$contact["price"],
                'voyageur_max'=>$contact["voyageur_max"],
                'note'=>$contact["note"],
                'localisation'=>$contact["localisation"],
                'short_description'=>$contact["short_description"],
                'main_picture'=>$contact["main_picture"]
            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();