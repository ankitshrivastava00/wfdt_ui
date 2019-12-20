<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    <title>View User</title>

    <style>
        #header{
            width: 100hw !important;
            height: 20% !important;
            background-color: #4676b5;
            padding: 2%;
        }

        body{
            margin:0% !important;
            font-family: 'Roboto', sans-serif;
        }
 h1 {
    font-size: 28px;
    text-align: center;
}
img {
    vertical-align: middle;
    align-items: center;
}
 h5 {
    font-size: 15px;
    text-align: center;
}
        #logo_div{
            display: flex;
            justify-content: center;
        }

        #footer{
            width:100hw !important;
            height: 20% !important;
            background-color: #4676b5;
            padding: 2%;
            color:#fff;
            display: flex;
            justify-content: center;
            bottom: 0;
        }

        #main_container{
            min-height:100% !important;
            position:relative;
        }

        #action_area{
            min-height: 65vh !important;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left: 10%;
            margin-right: 10%;
        }

        #member_image{
            border-radius: 15px;
               align-items: center;
               vertical-align:middle;

        }

        #image_col{
            margin-left: 3%;
        }

        .heading_text{
            color: #215496;
        }

        #container_box{
            box-shadow: 4px 7px 15px rgba(8, 8, 8, 0.233);
            border-radius:15px;
            padding:5%;
        }

    </style>

	<?php

// Show all URL parameters (and
// all form data submitted via the 
// 'get' method)
foreach($_GET as $key=>$value){
    //echo $key, ' => ', $value, "<br/>n";
}

// Show a particular value.
$id = $_GET['id'];

if($id) {
   // echo '<p/>ID: ', $id, "<br/>n";
	$curl = curl_init();




curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/get_member_data.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

  CURLOPT_POSTFIELDS => "{\n\"employee_id\":\"$id\"\n}\n",

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

}
}
else {
    echo '<p>No ID parameter.</p>';
}

?>
	
	
</head>

<body>

 <div id="main_container">
        <div id="header">
            <div id="logo_div">
                <img class="img img-responsive text-center m-auto" src="images/logo.png">
            </div>
        </div>
        <div id="action_area" class="justify-content-center">
            <div class="row">
                    

                    <div class="col-md-3 text-center" style="margin-top: 5%;" id="image_col">
                            <img id="member_image" src=<?php echo $array["responce"]["0"]["img_address"]?> width="100">
                    </div>
                    
                   
                    <div class="col-md-6">
                      <c></c>  <h1 id="member_name"><?php echo $array["responce"]["0"]["member_name"]?></h1> </c>
                        <h5>Membership ID : <?php echo $array["responce"]["0"]["id"]?></h5>
                        <hr>
                        <div id="container_box">
                                <h2 class="heading_text text-center">Details</h2>
                                <table class="table table-hover text-center" style="margin-top: 4%;">
                                        <tbody>
                                            <tr>
                                                <td><b>Membership Type</b></td>  
                                                <td><?php echo $array["responce"]["0"]["member_type"]?></td>
                                            </tr>
                    
                                            <tr>
                                                <td><b>Employee ID</b></td>  
                                                <td><?php echo $array["responce"]["0"]["employee_id"]?></td>
                                            </tr>
                    
                                            <tr>
                                                <td><b>Post</b></td>  
                                                <td><?php echo $array["responce"]["0"]["member_post"]?></td>
                                            </tr>
                                              <tr>
                                                <td><b>Type</b></td>  
                                                <td><?php echo $array["responce"]["0"]["memtype"]?></td>
                                            </tr>
                    
                                            
                     <tr>
                                                <td><b>Passport</b></td>  
                                                <td><?php echo $array["responce"]["0"]["passport"]?></td>
                                            </tr>
                    
                                            <tr>
                                                <td><b>Validity</b></td>  
                                                <td><?php echo $array["responce"]["0"]["member_validity"]?></td>
                                            </tr>
                                        </tbody>
                                </table>
                        </div>
                    </div>
                     <div class="col-md-2 text-center" style="margin-top: 4%;">
                        <img src=<?php echo $array["responce"]["0"]["qr_address"]?> width="100" >
                        <p class="text-center">Scan QR Code to verify member</p>
                    </div>
            </div>
        </div><!--Action Area End-->
        <div id="footer" class="navbar fixed-bottom">
            <p class="text-center">For More Inquiry<br>
            Email : info@wfdp-ea.org <br>
            Opening Hours : 10:00 AM to 5:00 PM</p>
        </div>
    </div>


</body>
</html>