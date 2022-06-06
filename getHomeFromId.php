<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $id = $_GET["id"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT id, name, type, price, voyageur_max, note, localisation, short_description, main_picture, owner, code FROM LOGEMENT WHERE id=?');
        $data->execute(array($id));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'name'=>$contact["name"],
                'type'=>$contact["type"],
                'price'=>$contact["price"],
                'voyageur_max'=>$contact["voyageur_max"],
                'localisation'=>$contact["localisation"],
                'short_description'=>$contact["short_description"],
                'main_picture'=>$contact["main_picture"],
                'owner'=>$contact["owner"],
                'code'=>$contact["code"],
            ));
        }
        return json_encode($contacts);
    }
}
$api = new API;
header('Content-Type:application/json');
echo $api->Select();