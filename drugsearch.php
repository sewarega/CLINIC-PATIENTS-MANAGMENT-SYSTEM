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

<link rel="stylesheet" type="text/css" href= "tcal.css" />
<script type="text/javascript" src="tcal.js"></script>

<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script type="text/javascript" src="jquery.js"></script>

 <script>
function onlyNum(evt) {
  // Usage: onKeyPress="return onlyNum(event)"
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;

  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    var status = 'This field accepts numbers only!';
    alert(status);
    return false;
  }
  var status = '';
  return true;
}
</script>

<script type='text/javascript'>
function checkvalidation()
{
	
	
	var dname = document.getElementById('dname');
      var cname = document.getElementById('cname');
	  var drug_type = document.getElementById('drug_type');
	  var unit = document.getElementById('unit');
	  if(isAlphabet( dname, "Please fill Drug Name in letters only")){
		  if(isAlphabet( cname, "Please fill Manufacture Name in letters only")){
			  if(madeSelection(drug_type,"Please Choose Drug Type")){
				  if(madeSelection(unit,"please choose Drug Unit")){
 return true;
	  }}}}
	return false;	
}

function isAlphabet(elem, helperMsg)
	{
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}
	else
		{
		alert(helperMsg);
		elem.focus();
		return false;
	}
	}
	function madeSelection(elem, helperMsg){
	if(elem.value =="it"){
	alert(helperMsg);
		elem.focus();
		return false;
		}
	else{
		return true;	
	}
}
</script>
</head>
<body>
<div id="cover">
		<div id="header">
       	   <div id="site_title"><h2 id="hheader"style="margin-left:180px;margin-top:40px;font-size:22px;font-family:Cooper Black;"><b><span style="font-size:36px;color:white"><span style="font-size:52px;color:white"></span></span><br/></b></h2></div>
		</div>
      <div >
			<ul id="menu1">
				<li><a href="home.php" class="current">Home</a></li>
				<li><a href="#">Manage Drug</a>
					<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="drugregister.php">Registre Drug</a></li>
						<li><a href="updatedrug.php">Update Drug</a></li>
						<li><a href="viewdrug.php">View Drug</a></li>

					</ul>
				</li>
				<li><a href="checkexpire.php">Check Expire Date </a></li>

				<li><a href="#">Other Operation</a>
					<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="pharmacyreport.php">Generate Report</a></li>
						<li><a href="checkprescreptionrequest.php">Check request</a></li>
						<li><a href="searchpres.php">Deliver drug</a></li>
						

					</ul>
				</li>
							<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
    <div id="main1">
		<div id="content">
		<div class="flt1 cpinner">
		<div class="flt1 lp_boxbg" style="background-color:white;">
		<br><br><hr>
		<span style="font-family: cambria;color:#006699;font-size:23px;">About Drugs</span><br />
        A pharmaceutical drug (medicine or medication and officially medicinal product) is a drug used in health care. Such drugs aid the diagnosis, cure, treatment, or prevention of disease. <br /> <BR/>
		<img src="img/d1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
			<ul id="dropdow">
				
						<li><a href="updatedrug.php"><span style="font-size:15px;">Update Drug</span></a></li>
				
				<li><a href="checkexpire.php"><span style="font-size:15px;">Check Expire Date</span> </a></li>
					
						<li><a href="pharmacyreport.php"><span style="font-size:15px;">Generate Report</span></a></li>
						<li><a href="checkprescreptionrequest.php"><span style="font-size:15px;">Check request</span></a></li>
						<li><a href="drugdeliver.php"><span style="font-size:15px;">Deliver drug</span></a></li>
						

							  </div>

			<div  class="flt rp_block" style="margin-left:30px;">

<div style="margin-left:40px;">  </br></br><hr> 
		<span style="font-family: cambria, Helvetica, sans-serif;color:#006699;font-size:23px;">Filter Add drug From Database </span><br />
						
       <form id="form1" name="login" method="POST" action="drugadd.php" onsubmit="return validateForm()">
 <table width="429px" valign="top" align="left">
  <tr>
<td class='para1_text' width="290px"><font color="red"></font> <b>Drug Code NO.</b></td>
<td><input name="dcode" type="text"   required /></td>
    <td><p align="center"><input type="submit" name="search" class="button_example" value="Filter" /></p></td>
  </tr>
</table></br>
  </form>
  </div>  </br></br>
   <?php
$connection=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$connection);
if(isset($_POST['Submit']))
{
$dcode=$_POST['dcode'];
$dname=$_POST['dname'];
$cname=$_POST['cname'];
$drug_type=$_POST['drug_type'];
$dosage=$_POST['dosage'];
$quantity=$_POST['quantity'];
$unit=$_POST['unit'];
$shelfno=$_POST['shelf_no'];
$exdate=$_POST['expire_date'];
$sql="SELECT * FROM drugtable where dcode='$dcode' AND dname='$dname' AND cname='$cname' AND drug_type='$drug_type' AND dosage='$dosage' AND unit='$unit' AND shelf_no='$shelfno' AND expire_date='$exdate'"; 
   $result=mysql_query($sql,$connection);
if(mysql_num_rows($result)>0)
{
while($row=mysql_fetch_array($result))
{
$quanti=($row['quantity'])+($quantity);
		
mysql_query("UPDATE drugtable SET dcode='$dcode',dname='$dname',cname='$cname', drug_type='$drug_type', dosage='$dosage',quantity='$quanti',unit='$unit' where dcode='$dcode' AND dname='$dname' AND cname='$cname' AND drug_type='$drug_type' AND dosage='$dosage' AND shelf_no='$shelfno' AND expire_date='$exdate'");
echo"<center><font size='4px' color='green'><img src='img/tick.png' width='25px' align='center' height='25px'>&nbsp;&nbsp;<p align='center'>Updated Drug seccessfilly!!!</p></font></center>";
echo' <meta content="7;drugsearch.php" http-equiv="refresh" />';
}
}
else{
$res=mysql_query("INSERT INTO drugtable values('$dcode','$dname','$cname','$drug_type','$dosage','$quantity','$unit','$shelfno','$exdate') ");
if(!$res)
	{
echo"<font size='4px' color='red'><p class='wrong'>Insertion failed , Please change Drug Code!!!</p></font>";
echo' <meta content="8;drugsearch.php" http-equiv="refresh" />';
	}
	else
	{

echo"<font size='4px' color='green'><img src='img/tick.png' width='25px' height='25px'>&nbsp;&nbsp;<p class='left'>You have succefully registered drug in to your data base!!!</p></font>";
echo' <meta content="7;drugsearch.php" http-equiv="refresh" />';
	}
}
}
 mysql_close($connection);
?>  
  </br></br>



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
