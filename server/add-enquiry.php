<?php
header('Access-Control-Allow-Origin: *');
//Creates a class called Enquiry
class Enquiry
{
    public $establishment;
    public $clientName;
    public $email;
    public $checkin;
    public $checkout;
    public $adults;
    public $children;
    public $notes;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

//Creates new enquiry and sets properties
$newEnquiry = new Enquiry();
$newEnquiry->establishment = $data["establishment"];
$newEnquiry->clientName = $data["clientName"];
$newEnquiry->email = $data["email"];
$newEnquiry->checkin = $data["checkin"];
$newEnquiry->checkout = $data["checkout"];
$newEnquiry->adults = $data["adults"];
$newEnquiry->children = $data["childrens"];
$newEnquiry->notes = $data["notes"];

//Adds object to array
$enquiriesList = file_get_contents('enquiries.json');
$jsonInput = json_decode($enquiriesList, true);
array_push($jsonInput, $newEnquiry);

//Writes array to JSON file
$jsonData = json_encode($jsonInput);
file_put_contents('enquiries.json', $jsonData);
$response = array("successful" => true, "status" => 200);
echo json_encode($response);
