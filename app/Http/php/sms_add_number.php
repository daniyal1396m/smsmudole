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
'password' => 'demo',
'fullname' => 'وب سرویس ره رایان پژوه',
'number' => '+989121111111',
'catid' => '236612',
'gender' => '1',//1 agha , 2 khanom
'fullname_en' => 'RahRayan',
'gender_en' => '1',
);
$md_res = $client->call("sms_add_number",$params);
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