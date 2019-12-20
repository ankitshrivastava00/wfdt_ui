<html>
<head><title>PHP Get Results</title>
<style>
    
      h1 {background-color:skyblue;}
    body {background-color:#e6ebef;}
    form{
      margin: 0px;
      padding: 0px;
    }
    .first{
          width: 40%;
          margin: auto;
    }
    @media only screen and (max-width: 480px){
     .first{
      width: 100%;
     }
}
    </style>
</head>

<?php
 if (isset($_POST['submit'])){
    $name1 =$_REQUEST['username1'];
    $pwd1 =$_REQUEST['password1'];
  // Show all URL parameters (and
// all form data submitted via the 
// 'get' method)
foreach($_GET as $key=>$value){
    //echo $key, ' => ', $value, "<br/>n";
}

// Show a particular value.
//$id = $_GET['id'];
$id =$name1;
$pwd=$pwd1;
if($id) {
   // echo '<p/>ID: ', $id, "<br/>n";
  $curl = curl_init();




curl_setopt_array($curl, array(

 CURLOPT_URL => "http://joietouch.com/wtfqr_api/logtest.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

  CURLOPT_POSTFIELDS => "{\n\"employee_nm\":\"$id\"\n,\n\"employee_pwd\":\"$pwd\"\n}\n",

  CURLOPT_HTTPHEADER => array(

    "cache-control: no-cache",

    "content-type: application/json",

    "postman-token: f9ecf6e6-9305-f42a-4d51-943e13db3961"

  ),

));



$status =$curl;
$response = curl_exec($curl);

$err = curl_error($curl);




curl_close($curl);




if ($err) {

  echo "cURL Error #:" . $err;

} else {

  //echo $response;
$json_pretty = json_encode(json_decode($response), JSON_PRETTY_PRINT);
//echo $json_pretty;
$array = json_decode($response, true);
//echo '<pre>'; print_r($array);
//$array = json_decode($response, true);
//echo '<pre>'; print_r($array);
//echo ("UserNmae&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            " .$array["responce"]["0"]["username"]) ;
//echo ("Userpwd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            " .$array["responce"]["0"]["password"]) ;
  //header("Location: home.php"); // Redirect user to index.php
  ////
    if($id == $array["responce"]["0"]["username"] && $array["responce"]["0"]["password"] == $pwd){
                                     header("Location: home.php");
                                     //header("location:DataInfo.php?uid=".$userID);
                                      //echo'<tr><td colspan="2"><center><b style="color:red;">right username or password, please again!   </b></center></td></tr>';
                                   }
                                 else  {
                                    echo'<tr><td colspan="2"><center><b style="color:red;">Invalide username or password, please check again!   </b></center></td></tr>';             
                                    }
////
}
}
else {
    echo '<p>No ID parameter.</p>';
}
    }else
  {
    
    
  }


?>

<body style="">
 <div class="first" style="border:1px solid black;">
  <div>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<p ALIGN=CENTER class="pagh"> <img src="globe.png">
 
 <div style="border:1px solid black;" >
  <div class="form">
    <h1 ALIGN=CENTER>Admin-Login</h1>
      <div style="border:1px solid grey;">
          
<form action="" method="post" name="login">
<p ALIGN=CENTER><input type="text" name="username1" placeholder="Username" required /></p>
<p ALIGN=CENTER><input type="password" name="password1" placeholder="Password" required /></p>
<p ALIGN=CENTER><input name="submit" type="submit" value="  LOG-IN  " /></p>
</div>
</form>
      </div>
  </div>
</div>
</div>
  <script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script> 
</body>
</html>
