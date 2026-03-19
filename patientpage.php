<?php
	include("config.php");
 session_start();
if(isset($_SESSION['user_name']))
 {
  $uname=$_SESSION['user_name'];
  $id=$_SESSION['user_id'];
 }
 else
{
   //header("Location:login.php");
}
 ?>
 <?php
$conn=mysql_connect("localhost","root",""); //create connection
mysql_select_db("Auclinic_database",$conn);      //to select from the db
$unam=$_SESSION['user_name'];
$result=mysql_query("SELECT * FROM  account WHERE 	user_name='$unam'")or die(mysql_error);
$row=mysql_fetch_array($result);
$FirstName=$row['fname'];
$LName=$row['lname'];
$user_name=$row['user_name'];
$id=$row['user_id'];
?>
 
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
<title>Address- <?php echo $row['fname'] . " " . $row['lname'] ?> </title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>clinic</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="jquery.js"></script>
</style>
</head>
<body >
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
						<li><a href="patientdetail.php">View detaile information</a></li>					
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
    </h6>
		<span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />

		  </div>
		
			<div  class="flt rp_block" style="margin-left:10px;">	
			<h1 align="right"><?php 
echo '<img src="img/people.png" width="40px" height="30px">&nbsp;'.'<font style="text-transform:capitalize;
"face="times new roman" color="green" size="3">Hi,&nbsp;&nbsp;'.$FirstName."&nbsp;&nbsp;&nbsp;".$LName." ".'</font>';?></h1>

     <div class="login" style="margin-left:20px;">
										<h1>WELL COME TO PATIENT PAGE </h1>
   </div>
              
<br>
 
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