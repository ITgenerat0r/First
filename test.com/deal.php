<?php 

$data = array (
  'add' => 
  array (
    0 => 
    array (
      'name' => $_POST['name'],
      'sale' => $_POST['budget'],
      'created_at' => $_POST['date'],
      'contacts_id' => 
      array (
        0 => $_POST['phone'],
        1 => $_POST['mail'],
      ),
    ),
  ),
);
$link = "https://codegenerator.amocrm.ru/api/v2/leads";

$headers[] = "Accept: application/json";

 //Curl options
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__)."/cookie.txt");
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__)."/cookie.txt");
$out = curl_exec($curl);
curl_close($curl);
$result = json_decode($out,TRUE);
require('contact.php');