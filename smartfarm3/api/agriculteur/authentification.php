<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/DBConfig.php';
include_once '../../models/Agriculteur.php';
include_once '../../controller/AgriculteurController.php';

// instantiate DB & Connect
$db_config = new DBConfig();
$db = $db_config->connect();

// instantiate Agriculteur Controller
$controller = new AgriculteurController($db);

// get data send from Android + Clean Data
$data = json_decode(file_get_contents("php://input"));

$email = htmlspecialchars(strip_tags($data->email));
$mot_de_passe = htmlspecialchars(strip_tags(md5($data->mot_de_passe)));

// instantiate Agriculteur 
$agriculteur = new Agriculteur();
$agriculteur->setEmail($email);
$agriculteur->setMotDePasse($mot_de_passe);

// result
echo json_encode($controller->authentification($agriculteur));
