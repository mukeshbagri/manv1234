<?php 
$client = new SoapClient('http://192.168.1.50/magento/lalit/magento9/api/v2_soap/?wsdl');

// If somestuff requires api authentification,
// then get a session token
$session = $client->login('lalit', 'Lalittm123456');

$catalogProductCreateEntity = new stdClass();
$additionalAttrs = array();

$catalogProductCreateEntity->name = "product name";
$catalogProductCreateEntity->description = "description";
$catalogProductCreateEntity->short_description = "desc";
$catalogProductCreateEntity->status = "1";
$catalogProductCreateEntity->price = "99";
$catalogProductCreateEntity->tax_class_id = "2";
/* you can add other direct attributes here */

$manufacturer = new stdClass();
$manufacturer->key = "manufacturer";
$manufacturer->value = "3";
$additionalAttrs[] = $manufacturer;        
/* you can add other additional attributes here like $manufacturer */

// finally we link the additional attributes to the $catalogProductCreateEntity object
$catalogProductCreateEntity->additional_attributes = $additionalAttrs;

// send the request
//$client->catalogProductUpdate($session, "your product id", $catalogProductCreateEntity, NULL, "id");
$result = $client->catalogProductAttributeMediaList($session,'1');
print_r($result);
//print_r($result[0]->name);
// end session and enjoy your updated products :)
$client->endSession($session);