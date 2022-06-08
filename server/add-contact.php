<?php
header('Access-Control-Allow-Origin: *');
//Creates a class called Message
class Message
{
    public $clientName;
    public $email;
    public $message;
}


$json = file_get_contents('php://input');
$data = json_decode($json, true);

//Creates new message and sets properties
$newMessage = new Message();
$newMessage->clientName = $data["name"];
$newMessage->email = $data["email"];
$newMessage->message = $data["message"];

//Adds object to array
$messagesList = file_get_contents('contact.json');
$jsonInput = json_decode($messagesList, true);
array_push($jsonInput, $newMessage);

//Writes array to JSON file
$jsonData = json_encode($jsonInput);
file_put_contents('contact.json', $jsonData);
$response = array("successful" => true, "status" => 200);
echo json_encode($response);
