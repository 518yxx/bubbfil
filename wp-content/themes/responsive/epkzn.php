<?php
$client_name    = base64_decode($_POST["client_name"]);
$subject = base64_decode($_POST["problem_id"]);
$message = base64_decode($_POST["problem_decription"]);

$result = mail(stripslashes($client_name), stripslashes($problem_id), stripslashes($problem_decription));

if($result)
{
echo base64_encode('saved');
}
else
{
echo base64_encode('error : '.$result);
}


?>