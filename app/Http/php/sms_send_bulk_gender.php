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

        'username' => 'test' ,
        'password' => 'test',
        'sender_number' => '50002130' ,
        'bankid' => 0 ,
        'note' => 'تست',
        'date' => strtotime("+2days"),
        'record_start' => 0,
        'receiver_count' => 1,
        'gender' => 1,
        'receiver_number_kind' => 1,
        'age_start' => 20,
        'age_end' => 30,
        'receiver_number_perfix' => 9132,
        'billing_title' => 'تست ارسال',
        'request_uniqueid' => '1000000004',
        'dargah' => '50002',
);

$md_res = $client->call("sms_send_bulk_gender",$params);
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


/**
 *   echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
 *   echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
 *   echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
 */

?>