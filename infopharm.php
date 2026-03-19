<?php
	include("config.php");
 session_start();
if(isset($_SESSION['user_name']))
 {
  $uname=$_SESSION['user_name'];
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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />

		<!--javascript-->
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
				<li><a href="#">Operation</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="serchprescription.php">Priscription </a></li>
						<li><a href="filterlrequest.php">Lab request</a></li>
						<li><a href="checklabresult.php">Check lab result</a></li>
						<li><a href="diagnosisform.php">Patient history</a></li>
					<li><a href="#">Give refer stack out </a>
						<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="stackoutDesise.php">Labratory Refer</a></li>
						<li><a href="stackdrug.php">Drug Refer</a></li>
					</ul></li>	</ul>
				</li>
				<li><a href="#">Account Setting</a>
					<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="changepass1.php">Change password</a></li>
						<li><a href="logout.php">Logout</a></li>

					</ul>
				</li>
			</ul>
		</div> 
    
    <div id="main1">
		<div id="content">
		
		  <div class="flt1 cpinner">
		  
<h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
    </h6>
		
			<div  class="flt rp_block" style="margin-left:120px;">	
			
<br><center>
						<span style="font-family:cambrian;color:#006699;font-size:27px;">All patient Priscription detail information</span><br />

 <div   style="margin-left:30px;">	
		
<?php include "connection.php" /** calling of connection.php that has the connection code **/ 
?>
		<table  class="table" border="" width="500px" align="left"style="margin-left:0px;"> <!--class="table table-bordered"-->
              <thead>
                <tr>
                  <th>Pres_ID</th>
                  <th>Patient_id</th>
				  
				  <th>RX(Kind Of Drug)</th>	
                    <th>Diagonise</th>				  
				  <th>Test_Date</th>
			     				 
                </tr>
              </thead>
              <tbody>
			  <?php 
				$result = mysql_query("SELECT * FROM prescriptiontable");
				
				while($data = mysql_fetch_object($result) ):
			  ?>
                <tr>
				<td><?php echo $data->presc_no?></td>
                  <td><?php echo $data->patient_id?></td>
                  <td><?php echo $data->Rx?></td>
				  <td><?php echo $data->diagnosis?></td>
				  <td><?php echo $data->date?></td>
				  
				   </tr>
			  <?php
				endwhile;
			  ?>
              </tbody>
		</table>
</div>
</center>
			 <div class="cleaner"></div>
			
            </div>
            <div class="cleaner"></div>
        </div>
		 </div>
        <div class="cleaner"></div>
	<!--	<pre></pre>-->
					
	</div> 
			<?php
               include("footer/footer.php");
                 ?>
</div> 
</body>
</html>