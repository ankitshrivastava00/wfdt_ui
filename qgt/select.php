<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$name =$_REQUEST['name'];
$status = "Record Search Successfully1.";
$curl = curl_init();




curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/get_member_data.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",

  CURLOPT_POSTFIELDS => "{\n\"employee_id\":\"$name\"\n}\n",

  CURLOPT_HTTPHEADER => array(

    "cache-control: no-cache",

    "content-type: application/json",

    "postman-token: f9ecf6e6-9305-f42a-4d51-943e13db3961"

  ),

));




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
echo ("DB ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            " .$array["responce"]["0"]["id"]) ;
echo "<br>";
echo (" Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              " .$array["responce"]["0"]["member_name"]);
echo "<br>";
echo ("member_type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        " .$array["responce"]["0"]["member_type"]);
echo "<br>";
echo ("employee_id  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         " .$array["responce"]["0"]["employee_id"]);
echo "<br>";
echo ("member_post &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         " .$array["responce"]["0"]["member_post"]);
echo "<br>";
echo ("passport  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          " .$array["responce"]["0"]["passport"]);
echo "<br>";
echo ("member_validity  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      " .$array["responce"]["0"]["member_validity"]);
echo "<br>";

echo "<br>";
echo "<img src=".$array["responce"]["0"]["qr_address"]." height=200 width=200 />";
echo "<img src=".$array["responce"]["0"]["img_address"]." height=200 width=200 />";

}

}




?>

	<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Record Search Option</title>
<link rel="stylesheet" href="css/select.css" />
</head>
<body>
<div class="select"
<h1>Record Search Option</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
<?php 

 ?></p>

<a>Record Search</a> <br /><br />
Development & Genrated BY Ziasy Team</a>

</div>

</div>
</body>
</html>