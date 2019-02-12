<?php

    $to = "migmira@hotmail.com,miguel@digitalcactus.mx";

    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "From: hola@digitalcactus.mx";
    $subject = "Mensaje Digital Cactus Mx";

    $fields = array();
    $fields{"name"} = "name";
    $fields{"email"} = "email";
    $fields{"phone"} = "phone";
    $fields{"project"} = "project";
    $fields{"message"} = "message";

    $body = "Aqui esta el mensaje recibido:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

    $send = mail($to, $subject, $body, $headers);

     if ($send)
	   $responseArray = array('type' => 'success', 'message' => '¡Muchas Gracias! Te contactaremos en breve');
    
    else
	   $responseArray = array('type'=> 'danger', 'message' => 'Algo salió mal, envía por favor un correo a hola@digitalcactus.mx');


    header('Content-Type: application/json');

    echo json_encode($responseArray);

?>
