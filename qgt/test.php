<?php




$curl = curl_init();




curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/registration.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

  CURLOPT_POSTFIELDS => "{\n\"member_name\":\"test27\", \n\"member_type\":\"Employee\",\n\"employee_id\":\"HDREF-0000080\",\n\"member_post\":\"tesm lead\",\n\"member_validity\":\"2019-09-12\",\n\"qr_address\":\"005_file_3eac634e3894e33137332811e715e4ac.png\",\n\"img_address\":\"HMS_DESIGN.jpg\",\n\"passport\":\"abc1234324324\"\n}\n",
//CURLOPT_POSTFIELDS => "{\n\"member_name\":\"$name\", \n\"member_type\":\"$mstype\",\n\"employee_id\":\"$age\",\n\"member_post\":\"$mpost\",\n\"member_validity\":\"$mvalidity\",\n\"qr_address\":\"$filepath\,\n\"img_address\":\"$filepath\"\n,\n\"mpassport\":\"$filepath\"\n,\n\"passport\":\"1234324324\"\n}\n",

  CURLOPT_HTTPHEADER => array(

    "cache-control: no-cache",

    "content-type: application/json",

    "postman-token: 88898756-723c-129a-59bd-80ba6b6295ed"

  ),

));




$response = curl_exec($curl);

$err = curl_error($curl);




curl_close($curl);




if ($err) {

  echo "cURL Error #:" . $err;

} else {

  echo $response;

}