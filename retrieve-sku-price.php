<?php
/*
 * Written By: Ben Hultin & David Wang & Nir Alfasi (alfasin)
 * Nov. 2013
 * 
 * This code is used to call an API (RESTful) service of Bluesnap that retrieves a sku's (contract's) price
 * We chose using CURL to place the API request in this demo, but we urge anyone who implements an API client 
 * to work with a RESTful API client framework in order to have a full support of all the properties of REST, such as: 
 * set HTTP method, get return-code, read/write headers, full XML support etc.
 * 
 * The API manual is available under "Developer Toolbox" section: 
 * http://www.bluesnap.com/helpcenter/Static/default.htm?bluesnap_web_services.htm
 * 
 */

//header("Content-Type: application/xml");
include_once('../credentials.php');

/**
 * Retrieve data from input fields
*/
$skuId = $_REQUEST['sku-id'];


/**
 * Initialize handle and set options
 */
$url = 'https://sandbox.plimus.com/services/2/skus/'.$skuId.'/price/USD';

$ch = curl_init();
curl_setopt($ch, CURLOPT_USERPWD, $credentials);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

/**
 * Execute Curl call and display XML response
*/
$result = curl_exec($ch);
curl_close($ch);

echo show_xml($result);
?>
