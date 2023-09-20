<?php
include_once('nusoap/nusoap.php');
$client = new soapclient_nu('http://www.5m5.ir/webservice/soap/smsService.php?wsdl', 'wsdl');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$err = $client->getError();
if ($err){
	print  'error'.$err;
}
$params= array(
'username' =>'demo' ,
'password' => 'demo'
);
$md_res = $client->call("sms_user_info",$params);
// Check for errors
$err = $client->getError();
if ($err)
{
	// Display the error
	echo '<h2>Error</h2><pre>' . $err . '</pre>';
}
else
{
   
print_r( $md_res);
}
?>