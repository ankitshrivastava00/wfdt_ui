<?php
$request = new HttpRequest();

$request->setUrl('http://joietouch.com/wtfqr_api/registration.php');

$request->setMethod(HTTP_METH_POST);




$request->setHeaders(array(

  'postman-token' => 'c1917372-fff1-7d0a-a200-096fd4899ea4',

  'cache-control' => 'no-cache',

  'content-type' => 'application/json'

));




$request->setBody('{

"member_name":"Ashish Yadav", 

"member_type":"HDREF-0000079",

"employee_id":"HDREF-0000079",

"member_post":"tesm lead",

"member_validity":"2019-09-12",

"qr_address":"5d82008e7252cf304f2dba12"

}

');




try {

  $response = $request->send();




  echo $response->getBody();

} catch (HttpException $ex) {

  echo $ex;

}
?>