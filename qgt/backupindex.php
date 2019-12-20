<?php 
include('./phpqrcode/qrlib.php'); 
//require('db.php');
$status = "";
$imgloc="";
//////////////
if(isset($_POST['Submit1']))
{ 
$filepath = "images/" . $_FILES["file"]["name"];

 $imgloc=$filepath;
if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=200 style=top:165px; />";
//<input type=\"text\" name=\"user_id\" value=\".$filepath ."\">

} 
//echo $filepath."SUCCESS !!";
} 


//////
 if(isset($_POST['new']) && $_POST['new']==1)
  {
	  
    //$username = stripslashes($_REQUEST['username']); // removes backslashes .$age." ".$trn_date;
	$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$mstype=$_REQUEST['mstype'];
$age = $_REQUEST['age'];
$mpost=$_REQUEST['mpost'];
$mtype=$_REQUEST['mtype'];
$mvalidity=$_REQUEST['mvalidity'];
$mpassport =$_REQUEST['mpassport'];
$imgadd=$_REQUEST['imgl'];
 $codeContents = $name." ".$mstype." ".$age." ".$mpost." ".$mtype." ".$mvalidity." ".$mpassport;
     
    
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     $qrpath=$fileName;
    $pngAbsoluteFilePath =$fileName; 
    $urlRelativeFilePath =$fileName; 
   
   
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath); 
        echo 'File generated!'; 
        echo '<hr />'; 
    } else { 
        echo 'File already generated! We can use this cached file to speed up site on common codes!'; 
        echo '<hr />'; 
    } 
     
    echo 'Server PNG File: '.$pngAbsoluteFilePath; 
    echo '<hr />'; 
     
    //
    echo '<img src="'.$urlRelativeFilePath.'" />'; 


	$status = $codeContents." : New Record QR Code Successfully.</br></br><a  </a>";
	////////////


$curl = curl_init();




curl_setopt_array($curl, array(

  CURLOPT_URL => "http://joietouch.com/wtfqr_api/registration.php",

  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_ENCODING => "",

  CURLOPT_MAXREDIRS => 10,

  CURLOPT_TIMEOUT => 30,

  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

  CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => "{\n\"member_name\":\"$name\", \n\"member_type\":\"$mstype\",\n\"employee_id\":\"$age\",\n\"member_post\":\"$mpost\",\n\"member_validity\":\"$mvalidity\",\n\"qr_address\":\" $fileName\",\n\"img_address\":\"$imgadd\",\n\"passport\":\"$mpassport\"\n}\n",

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

  echo $response;

}

////////////////////
}
	
	////////////////
  
  
    //
     

   
	?>
	<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/genrate.css" />
</head>
<body>
<div class="form">
<p><a Logout</a></p>
<h1>Insert New Record</h1>
<form action="index.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file">
<input type="submit" value="Upload" name="Submit1"> <br/>

</form>
<div class="select">

<form name="form" method="post" action="" class="qrform"> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="mstype" placeholder="Enter MembesrShip Type" required /></p>
<p><input type="text" name="age" placeholder="Enter Employer" required /></p>
<p><input type="text" name="mpost" placeholder="Enter Post" required /></p>
<p><input type="text" name="mtype" placeholder="Enter Type" required /></p>
<p><input type="text" name="mvalidity" placeholder="Enter Validity" required /></p>
<p><input type="text" name="mpassport" placeholder="Enter Passport" required /></p>
 <input type="text"  name="imgl" value="<?php echo @$imgloc ;?>"/>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;">
<?php 
echo $status;

 ?></p>

<a>QR CODE</a> <br /><br />
Development & Genrated BY Ziasy Team</a>

</div>

</div>
</body>
</html>