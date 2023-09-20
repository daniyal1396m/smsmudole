<?php
include_once('nusoap/nusoap.php');
$client = new soapclient_nu('http://www.5m5.ir/webservice/soap/smsService.php?wsdl', 'wsdl');
$client->soap_defencoding = 'UTF-8';
$client->decode_utf8 = false;
$err = $client->getError();
if ($err){
	print  'error'.$err;
}
//$params= array(
//        'username' =>'test' ,
//        'password' => 'test',
//        'sender_number' => array('10005970' , '30005971'),
//        'receiver_number' =>array('989121111111,989121111111' , '989121111111'),
//        'note' => array( 'تست ۱' ,'تست ۲'),
//        'date' =>array( strtotime('+1days'),'0'), 
//        'request_uniqueid' => array( '8' , '5'),
//        'flash' =>  1,
//        'onlysend' => 'ok',  
//);
//$params= array(
//        'username' =>'test' ,
//        'password' => 'test',
//        'sender_number' => array('10005970'),
//        'receiver_number' =>array('989121111111','989121111111,989121111111'),
//        'note' => array( 'تست ۱'),
//        'date' =>array( '0'), 
//        'request_uniqueid' => array( '13'),
//        'flash' =>  'no',
//        'onlysend' => 'ok',  
//);
$params= array(
        'username' =>'test' ,
        'password' => 'test',
        'sender_number' => array('10005970'),
        'receiver_number' =>array('09121111111'),
        'note' => array( 'تست ۱'),
        'date' =>array( '0'), 
        'request_uniqueid' => array( '13'),
        'flash' =>  'no',
        'onlysend' => 'ok',  
);
$md_res = $client->call("send_sms",$params);
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

  echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
  echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
 echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';

/**
 *  Array
 * (
 *     [0] => 65,66
 *     [1] => error [ error_sender_number_is_not_allowno ]
 * )
 * Array
 * (
 *     [0] => error [ wronge request_uniqueid ] [ request_uniqueid تکراري ميباشد ]
 *     [1] => error [ wronge request_uniqueid ] [ request_uniqueid تکراري ميباشد ]
 * )
 */

?>