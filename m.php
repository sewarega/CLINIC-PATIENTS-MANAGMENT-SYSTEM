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
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <!--javascript-->
<script type="text/javascript" src="jquery.js"></script>
<?php
	include("validation/patientupdate.php");

 ?>
</head>
<body>
<div id="cover">
		<div id="header">
       	   <div id="site_title"><h2 id="hheader"style="margin-left:180px;margin-top:40px;font-size:22px;font-family:Cooper Black;"><b><span style="font-size:36px;color:white"><span style="font-size:52px;color:white"></span></span><br/></b></h2></div>
		</div>
      <div >
<ul id="menu1">
				<li><a href="home.php" class="current">Home</a></li>
				<li><a href="#">Manage Patient</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="searchpa.php">Search Patient</a></li>
						<li><a href="patientreg.php">Register patient</a></li>
						<li><a href="searchupdate.php">Update patient</a></li>
						<li><a href="viewpatien.php">View patient</a></li>
					</ul>
				</li>
				<li><a href="dehp">Operation </a>
				<ul style="margin-left:10px;padding-right:4px;">
				<li><a href="card.php">Give Card to Patient </a></li>
				<li><a href="serchpatient.php">Register appointment </a></li>
					<li><a href="searchappo.php">Check appointment date</a></li>
					<li><a href="generalreport.php">Generat Report</a></li>
					<li><a href="export/exlepatient.php">Export patient info</a></li>	
					</ul>
				</li>
				<li><a href="dehp">Account Setting </a>
				<ul style="margin-left:10px;padding-right:4px;">
				<li><a href="changepass1.php">Change password</a></li>
				<li><a href="logout.php">logout</a></li>
				
					</ul>		
				</li>
				
			</ul>
		</div> 
    <div id="main1">
		<div id="content">
		 <div class="flt1 cpinner">
		 <div class="flt1 lp_boxbg"> 					<h1 align="left"><?php 
echo '<img src="img/people.png" width="50px" height="40px">&nbsp;'.'<font style="text-transform:capitalize;
"face="times new roman" color="green" size="3">Hi,&nbsp;&nbsp;'.$FirstName."&nbsp;&nbsp;&nbsp;".$LName." ".'</font>';?></h1>
		 <span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
<li><a href="card.php">Give Card to Patient </a></li>
				<li><a href="serchpatient.php">Register appointment </a></li>
					<li><a href="searchappo.php">Check appointment date</a></li>
					<li><a href="generalreport.php">Generat Report</a></li>
					<li><a href="export/exlepatient.php">Export patient info</a></li>	
					
		  </div>
		<div  class="flt rp_block" style="margin-left:20px;">	
	
<?php
			include("config.php");	
			$id = $_GET['user_id'];
			if( isset( $_POST['update'] ) ): 
				$fname = $_POST['fname']; 
				$lname = $_POST['lname'];
				$sex = $_POST['sex'];
				$age = $_POST['age'];
				$dept = $_POST['department'];
				$phone = $_POST['phone_no'];
				$email = $_POST['email'];
				mysql_query("UPDATE patient_table SET fname = '$fname',lname = '$lname',sex = '$sex', age = '$age', department = '$dept',phone_no = '$phone', email = '$email' WHERE patient_id = '$pid'") or die(mysql_error()); 
				echo "<font color='black' size='4'><p class=''>The patient information succefully updated!!!</p></font>";
			 echo'<meta content="3;searchupdate.php" http-equiv="refresh" />';
			 echo "<br>";
			 echo "<font color='red' size='4'>Please wait</font>.........";
			endif;
			$result = mysql_query("SELECT * FROM patient_table WHERE patient_id='$id'");
			$data = mysql_fetch_object( $result ); 
			?>
			<form action="" method="POST"  bgcolor="#f076ff" border="0" cellspacing="2"name="myform" onsubmit="return checkvalidation()" >
			<table  class='table' >
			<tr>
			<tr><td>Patient_ID:</td><td width="130px"><input type='text' name='id' value="<?php echo $data->patient_id?>" disabled="disabled"></td></tr>
			<tr><td>FName:</td><td width="130px">
				<input type="text" value="<?php echo $data->fname ?>"  name="fname" id="fname"/></td></tr></br>
			<tr><td>LName:</td><td width="130px"></br>
				<input type="text" value="<?php echo $data->lname ?>"  name="lname" id="lname"/></td></tr></br>
			<tr><td>Gender:</td><td width="130px">
				<select class="span2" name="sex" id="sex">
					<?php if($data->sex=='Male'): ?>
						<option value="Male" selected>Male</option>
						<option value="Female">Female</option>
					<?php else: ?>
						<option value="Male">Male</option>
						<option value="Female" selected>Female</option>
					<?php endif; ?>
				</select></td></tr></br>
				<tr><td>Age:</td><td width="130px">
				<input type="text" name="age" id="age" value="<?php echo $data->age ?>"></td></tr></br>
			<tr><td>Department:</td><td width="130px">
				<input type="text" value="<?php echo $data->department ?>"  name="department" id="dept"/></td></tr></br>
			 
			   <tr><td>Phone_No:</td><td width="130px" align="center">
			   
				<input type="text"name="phone_no" maxlength='10'  id="phone"value="<?php echo $data->phone_no ?>"></td></tr></br>
              <tr><td>Email:</td><td width="130px">
				<input type="text" value="<?php echo $data->email ?>"  name="email" id="email"/></td></tr></br>
			<tr ><td colspan=2 align="right"><input type='submit' name="update" value='Save' class="button_example"></tr></td>
			</tr>
			</table>
			
		</form>		</br></br></br>
			 <div class="cleaner"></div>
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