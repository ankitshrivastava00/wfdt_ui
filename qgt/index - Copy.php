<?php 
include('./phpqrcode/qrlib.php'); 
$status = "";

 if(isset($_POST['new']) && $_POST['new']==1)
  {
	  
    $username = stripslashes($_REQUEST['username']); // removes backslashes .$age." ".$trn_date;
	$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$mstype=$_REQUEST['mstype'];
$age = $_REQUEST['age'];
$mpost=$_REQUEST['mpost'];
$mtype=$_REQUEST['mtype'];
$mvalidity=$_REQUEST['mvalidity'];

 $codeContents = $name." ".$mstype." ".$age." ".$mpost." ".$mtype." ".$mvalidity;
     
    // we need to generate filename somehow,  
    // with md5 or with database ID used to obtains $codeContents... 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath =$fileName; 
    $urlRelativeFilePath =$fileName; 
     
    // generating 
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
     
    // displaying 
	
    echo '<img src="'.$urlRelativeFilePath.'" />'; 
	$status = $codeContents." : New Record QR Code Successfully.</br></br><a  </a>";
    }else{}
    // how to save PNG codes to server 
     

   
	?>
	<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a Logout</a></p>

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter Name" required /></p>
<p><input type="text" name="mstype" placeholder="Enter MembesrShip Type" required /></p>
<p><input type="text" name="age" placeholder="Enter Employer" required /></p>
<p><input type="text" name="mpost" placeholder="Enter Post" required /></p>
<p><input type="text" name="mtype" placeholder="Enter Type" required /></p>
<p><input type="text" name="mvalidity" placeholder="Enter Validity" required /></p>
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