
<html>
<head><title>PHP Get Results</title></head>
<body>
<body style="padding-left:500px;padding-right:500px;">
 <div style="border:1px solid black;">
<p ALIGN=CENTER> <img src="globe.png">
 <style>
 
      h1 {background-color:skyblue;}
    body {background-color:#e6ebef;}
    </style>
	  <script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script> 
 <div style="border:1px solid black;">
<div class="form">
<h1 ALIGN=CENTER>MEMBER STATUS </h1>
 <div style="border:1px solid black;">
<form action="" method="post" name="login">
<p ALIGN=CENTER><input type="text" name="username" placeholder="Member Name" required /></p>
<p ALIGN=CENTER><input name="submit" type="submit" value="    SEARCH   " /></p>
</form>

<?php
$UID="";
$USTS="";
$status7 = "";
$status1 = "";
if(isset($_POST['submit']))
{
$name =$_REQUEST['username'];
$status = "Record Search Successfully1.";
$curl = curl_init();

//$name ="nidhi";


curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/byname.php",

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
$UID=$array["responce"]["0"]["id"];
$USTS="";
$result=$array["responce"]["0"]["id"];
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
echo ("Member Current Status   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     " .$array["responce"]["0"]["memstatus"]);
$options=$array["responce"]["0"]["memstatus"];
echo "<br>";
echo "<br>";
//echo "<img src=".$array["responce"]["0"]["qr_address"]." height=200 width=200 />";
//echo "<img src=".$array["responce"]["0"]["img_address"]." height=200 width=200 />";
//$status=$array["responce"]["0"]["qr_address"];
//$status1=$array["responce"]["0"]["memstatus"];
}

}
  //$codeContents = "http://joietouch.com/wfdp/qgt/imgprev.php?id=".$age"&mode=run"
if (isset($_POST['STATUS1']))
 {
	//header("Location: home.php"); 
	
	$stsName=$_POST['cmbstatus'];
	$age=$_POST['memid'];
		 	////////////


$curl = curl_init();




curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/stsup.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",
  //$stsName=$_POST["cmbstatus"];
 CURLOPT_POSTFIELDS => "{\n\"member_name\":\"$stsName\",\n\"employee_id\":\"$age\"\n}\n",

 // CURLOPT_POSTFIELDS => "{\n\"member_name\":\"test27\", \n\"member_type\":\"Employee\",\n\"employee_id\":\"HDREF-0000080\",\n\"member_post\":\"tesm lead\",\n\"member_validity\":\"2019-09-12\",\n\"qr_address\":\"005_file_3eac634e3894e33137332811e715e4ac.png\",\n\"img_address\":\"HMS_DESIGN.jpg\",\n\"passport\":\"abc1234324324\"\n}\n",
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
$id1=$_POST['memid'];
$st1= $_POST['cmbstatus'];
  echo "ID-".$id1."-NEW STATUS-".$st1."-Records Updated".$response;

}
 }
?>

</form>
<form action="" method="post" name="STATUS">
<div id="divCheckbox" style="visibility: visible">
 <div class="panel panel-primary" style="border: 2px solid blue">
 <br>
 MEMBER-ID: <input type="text" name="memid" input value="<?php if (isset($result)) echo $result ?>"readonly>
<br>
<br>
<p ALIGN=CENTER><label for="male">SELECT MEMBER NEW STATUS</label></p>
<p ALIGN=CENTER><select name="cmbstatus";width="170" style="width: 170px">
<option value="0">Please Select Option</option>
<option value="DEACTIVE" <?php if($options=="Deactive") echo 'selected="selected"'; ?> >Deactive</option>
<option value="ACTIVE" <?php if($options=="Active") echo 'selected="selected"'; ?> >Active</option>
</select></p>
<p ALIGN=CENTER><input name="STATUS1" type="submit" value="    STATUS CHANGE   " /></p>
<p ALIGN=CENTER><input name="navhome" type="submit" value="<< BACK TO MAIN PAGE" /></p>
</div>

  
</div>
</form>
</div>
</body>
</html>
<?php
 if (isset($_POST['navhome']))
 {
	header("Location: home.php"); 
 }
 
 ?>