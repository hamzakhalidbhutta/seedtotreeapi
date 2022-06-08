<?php
header('Access-Control-Allow-Origin: *');
//Creates a class called Contact
class Establishment
{
  //To add more variables create the variable name here and set below
  public $establishmentName;
  public $establishmentEmail;
  public $imageUrl;
  public $price;
  public $maxGuests;
  public $googleLat;
  public $googleLong;
  public $description;
  public $selfCatering;
  public $id;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

//Creates new establishment and sets properties
$newEstablishment = new Establishment();
$newEstablishment->id = $data["id"];
$newEstablishment->establishmentName = $data["name"];
$newEstablishment->establishmentEmail = $data["email"];
$newEstablishment->price = $data["price"];
$newEstablishment->imageUrl = $data["image"];
$newEstablishment->maxGuests = $data["maxGuests"];
$newEstablishment->googleLat = $data["lat"];
$newEstablishment->googleLong = $data["lon"];
$newEstablishment->description = $data["description"];
$newEstablishment->selfCatering = $data["catering"];



//Adds object to array
$establishmentsList = file_get_contents('establishments.json');
$jsonInput = json_decode($establishmentsList, true);
array_push($jsonInput, $newEstablishment);

//Writes array to JSON file
$jsonData = json_encode($jsonInput);
file_put_contents('establishments.json', $jsonData);
$response = array("successful" => true, "status" => 200);
echo json_encode($response);
