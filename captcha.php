<?php
    $secret_key = "6LfTEecfAAAAAG7v2iJxolh_Qf0giPD_xCfKFJhj";
    $verify_response = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] );
    $response_data   = json_decode( $verify_response );
    if (!$response_data->success){
        //Thực hiện các action khi mã captcha được verify
    }else{
        //Thực hiện các action khi mã captcha không được verify
    }
    
?>