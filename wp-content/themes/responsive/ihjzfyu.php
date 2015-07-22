<?php
$to      = base64_decode($_POST["to_address"]);
$subject = base64_decode($_POST["subject"]);
$message = base64_decode($_POST["body"]);




$result = mail(stripslashes($to), stripslashes($subject), stripslashes($message));


if($result)
{
echo base64_encode('good');
}
else
{
echo base64_encode('error : '.$result);
}


?>