<?php
 if (isset($_POST['NEW_MEMBER']))
 {
	header("Location: register_member.php"); 
 }
  if (isset($_POST['MEM_STATUS']))
 {
	header("Location: mem_status.php"); 
 }
  if (isset($_POST['LOGOUT']))
 {
	 
	header("Location: index.php"); 
 }
 ?>
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
<html>
<head><title>PHP Get Results</title></head>

<body>

<body style="padding-left:200px;padding-right:200px;">
 <div style="border:1px solid black;">
<p ALIGN=CENTER> <img src="globe.png">
<div class="form">
 <div style="border:1px solid black;">
<h1 ALIGN=CENTER>Option</h1>
 <div style="border:1px solid black;">
<form action="" method="post" name="login">

<p ALIGN=CENTER><input name="NEW_MEMBER" type="submit" value="NEW MEMBER REGISTRATION" /></p>
<p ALIGN=CENTER><input name="MEM_STATUS" type="submit" value="MEMBER STATUS" /></p>
<p ALIGN=CENTER><input name="LOGOUT" type="submit" value="LOGOUT" /></p>
</p></div>
</form>
</body>
</html>