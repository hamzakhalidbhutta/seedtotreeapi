<?php
header('Access-Control-Allow-Origin: *');
$json = file_get_contents('php://input');
$data = json_decode($json, true);
$username = $data["username"];
$password = $data["password"];

if ($username == "admin" && $password == "admin123") {

    $arr = array("valid" => true);
    echo json_encode($arr);
} else {


    $arr = array("valid" => false);
    echo json_encode($arr);
}
