<?php
header('Access-Control-Allow-Origin: *'); 
// header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$id = $data["id"];

$establishmentsList = file_get_contents('establishments.json');

$data = json_decode($establishmentsList);

if($id <= 0) {
    echo null;
    die();
}


foreach($data as $item)
{
    if($item->id == $id)
    {
        echo json_encode($item);
    }
}

?>