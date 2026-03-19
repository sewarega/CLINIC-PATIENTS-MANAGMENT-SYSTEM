<?php
	include("config.php");
 session_start();
if(isset($_SESSION['user_name']))
 {
  $uname=$_SESSION['user_name'];
  $Pid=$_SESSION['patient_id'];
 }
 else
{
   header("Location:login.php");
}
 ?>
 <?php

$unam=$_SESSION['user_name'];
$result=mysql_query("SELECT * FROM  account WHERE 	user_name='$unam'")or die(mysql_error);
$row=mysql_fetch_array($result);
$FirstName=$row['fname'];
$LName=$row['lname'];
$user_name=$row['user_name'];
$Pid=$row['patient_id'];
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	
<title>clinic</title>

<link rel="stylesheet" type="text/css" href= "tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<link rel="stylesheet" href="css/main.css" type="text/css" />
<link rel="stylesheet" href="css/menu.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	
<script type="text/javascript">
function printF(printData)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=760,height=800");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
</script>
</head>
<body bgcolor="white">

<div id="cover">
		<div id="header">
       	   <div id="site_title"><h2 id="hheader"style="margin-left:180px;margin-top:40px;font-size:22px;font-family:Cooper Black;"><b><span style="font-size:36px;color:white"><span style="font-size:52px;color:white"></span></span><br/></b></h2></div>
		</div>
      <div >
			<ul id="menu1">
				<li><a href="home.php" class="current">Home</a></li>
				<li><a href="#">Opration</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="serchappid.php">Check appointment date </a></li>
						<li><a href="patientdetailpage.php">View detaile information</a></li>					
					</ul>
				</li>
				<li><a href="dehp">Account Setting </a>
				<ul style="margin-left:10px;padding-right:4px;">
				<li><a href="logout.php">logout </a></li>
					<li><a href="changepass1.php">Change password</a></li>
								
					</ul>
				</li>
			</ul>       	
		</div> 
    <div id="main1">
		<div id="content">
		
		  <div class="flt1 cpinner">
		  
		<div class="flt1 lp_boxbg"> 
				<h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on patient page</li>
    </h6>
		<span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />

		  </div>
		
			<div  class="flt rp_block" style="margin-left:10px;">	
			
     <div class="login" style="margin-left:20px;">				
							<h1> View Patient Details</h1>
       <form id="form1" name="login" method="POST" action="patientdetailpage.php" onsubmit="return validateForm()">  	
<p style="font-size:14px;color:blue;" >if you wants to check patient appointment date information by using searching Date.</p>
   <table width="399px" valign="top" align="left"> 
  <tr>
<td class='para1_text' width="200px"><font color="red"></font> Patient_ID No.</td>
<td><input name="dayfrom" type="text" placeholder="ETR/001/05" required x-moz-errormessage="Please enter correct id"/></td>	
    <td><p align="center"><input type="submit" name="search" class="button_example" value="Submit" /></p></td>
  </tr>
</table></br>
  </form>
  </div></br>
 
</br></br></br>
			 <div class="cleaner"></div>
				</center>
            </div>
            <div class="cleaner"></div>
        </div>
		 </div>
        <div class="cleaner"></div>
		
	</div> 
	<?php
      include("footer/footer.php");
       ?>		
</div> 
</body>
</html>