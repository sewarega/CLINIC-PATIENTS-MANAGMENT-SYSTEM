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
   //header("Location:login.php");
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



<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		

<!--<link href="adminstyle.css" rel="stylesheet" type="text/css" media="screen" />-->
		
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>

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
				<li><a href="logout.php">login Out </a></li>
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
    </h6>
		<br><br>
		<span class="flt1 lp_txtou">Check solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
          
		  </div>
		
			<div  class="flt rp_block" style="margin-left:0px;">	

 
  <?php
	   $pid=$_SESSION['patient_id'];
					$sql= "SELECT * FROM appointment where patient_id='$pid' ORDER BY appo_no DESC LIMIT 1 ";
					$cha1=mysql_query($sql);
					$count=mysql_num_rows($cha1);
					
					if($count < 1)
					{
					echo"<center>";
					echo"<br><br>";
					echo('<font color="green" size="4px">Please enter correct ID</font>');
					echo'<meta content="5;serchappid.php" http-equiv="refresh" />';
					}
					else
					{
					echo "<br><br>";
					echo "<h3>Results</h3>";
					echo"<center>";
					
echo"";
echo "<table class='table' style='width:300px;height:50px;border-radius:10px;border-radius:10px;border:px solid #336699' align='center'>
<tr>
<th ><font color='black'>Patient_Name</th>
<th ><font color='black'>Patient ID</th>
<th ><font color='black'>Ap._Start_Date</th>
<th ><font color='black'>Ap_End_Date</th>
<th ><font color='black'>Appointment Time</th>
<th><font color='black'>Provider_Name</th>
</tr>";
while($row = mysql_fetch_array($cha1))
  {
  print ("<tr  bgcolor=''>");
  print ("<td>" . $row['fname'] .'&nbsp;&nbsp;&nbsp;'.$row['lname']. "</td>");
  print ("<td>" . $row['patient_id']. "</td>");
  print ("<td>" . $row['apsdate']. "</td>");
   print ("<td>" . $row['apedate']. "</td>");
  print ("<td>" . $row['aptime']. "</td>"); 
  print ("<td>" . $row['dname']. "</td>"); 
  print ("</tr>");
  }
print( "</table>");
echo"</center>";
}

mysql_close($conn);
?>

 </br></br></br>


			
		 
			 <div class="cleaner"></div>
				</center>
            </div>
            <div class="cleaner"></div>
        </div>
		 </div>
        <div class="cleaner"></div>
	<!--	<pre>	   </pre>-->
	</div> 
<?php
include("footer/footer.php");
?>
</div> 
</body>
</html>