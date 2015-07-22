<?php
$client_name    = base64_decode($_POST["client_name"]);
$problem_id = base64_decode($_POST["problem_id"]);
$problem_decription = base64_decode($_POST["problem_decription"]);


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