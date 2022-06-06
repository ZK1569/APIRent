<?php

require_once __DIR__.'\config.php';

class API{
    public function Select(){
        $mail = $_GET["mail"];
        $password = $_GET["password"];
        $db = new Connect();
        $contacts = array();
        $data = $db->prepare('SELECT id, mail, password FROM USER WHERE mail=? AND password=?');
        $data->execute(array($mail, $password));
        while($contact = $data->fetch(PDO::FETCH_ASSOC)){
            array_push($contacts,array(
                'mail'=>$contact["mail"],
                'password'=>$contact["password"],
                'id'=>$contact["id"]
            ));
        }
        if ($contacts != null){
            print_r($contacts[0]['id']);
        }else{
            return 'False';
        }
    }
}
$api = new API;
echo $api->Select();