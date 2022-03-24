<?php

/* Template Name: reCaptcha Page */

$secret="6Ld8fqQUAAAAAD6gyrrVZQqm7WlbHs5KfGwy_uDR";
$response=$_POST["response"];

$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $response);

$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {

    echo 'Secret : ' . $secret;
    echo 'Response : ' . $response;

}

else if ($captcha_success->success==true) {

	echo 'success';

}


?>