<?php

/*
    $data;
    // print_r($data);
    // echo $data;
    header('Content-Type: application/json');
    error_reporting(E_ALL ^ E_NOTICE);
    if(isset($_POST['g-recaptcha-response'])) {
      $captcha=$_POST['g-recaptcha-response'];
    }
    if(!$captcha){
      $data=array('nocaptcha' => 'true');
      echo json_encode($data);
      exit;
     }
     // calling google recaptcha api.
     $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Ld_zG4UAAAAACmaLT4I56matKabtGpTLUM5kO1h&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
     // validating result.
     // echo json_encode($response);
     if($response.success==false) {
        $data=array('spam' => 'true');
        echo json_encode($data);
     } else {
        $data=array('spam' => 'false');
        echo json_encode($data);
     }
     */

     $captchasecret = '6LfmTHYUAAAAAJGJmUIXGINeeQTQ0jCrphsYfaoT';
     $captcharesponse = $_POST['g-recaptcha-response'];

     if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){
       $arrContextOptions = array(
         "ssl"=>array(
           "verify_peer" => false,
           "verify_peer_name" => false,
         ),
       );
       // echo "<div>THIS IS LOCAL</div>";
       // echo $_SERVER["REMOTE_ADDR"];
       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captchasecret.'&response='.$captcharesponse.'&remoteip='.$_SERVER['REMOTE_ADDR'], false, stream_context_create($arrContextOptions));
     } else {
       // echo "<div>THIS IS LIVE</div>";
       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captchasecret.'&response='.$captcharesponse.'&remoteip='.$_SERVER['REMOTE_ADDR']);
       // echo $_SERVER["REMOTE_ADDR"];
     }

     $responseData = json_decode($verifyResponse);
     // print_r($responseData);

?>
