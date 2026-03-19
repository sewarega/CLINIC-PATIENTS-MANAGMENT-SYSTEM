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
		<div class="flt1 lp_boxbg" style="background-color:white;"><img src="img/d13.JPG" class="img-circ"width="200px" height="150px"><br><br><hr>
		
		<span style="font-family: monotype corsiva, Helvetica, sans-serif;color:#006699;font-size:30px;">About Drugs</span><br />
        A pharmaceutical drug (medicine or medication and officially medicinal product) is a drug used in health care. Such drugs aid the diagnosis, cure, treatment, or prevention of disease. <br /> <BR/>
		<img src="img/d1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
			<ul id="dropdow">
				
						<li><a href="updatedrug.php"><span style="font-size:15px;">Update Drug</span></a></li>
				
				<li><a href="checkexpire.php"><span style="font-size:15px;">Check Expire Date</span> </a></li>

				
					
						<li><a href="pharmacyreport.php"><span style="font-size:15px;">Generate Report</span></a></li>
						<li><a href="checkprescreptionrequest.php"><span style="font-size:15px;">Check request</span></a></li>
						<li><a href="drugdeliver.php"><span style="font-size:15px;">Deliver drug</span></a></li>
						

							  </div>

			<div  class="flt rp_block" style="margin-left:20px;">

<div style="width:480px; background-color:;border:px #b0c248 solid;border-top-right-radius:8px;border-top-left-radius:8px;
            border-bottom-right-radius:8px;border-bottom-left-radius:8p;margin-left:40px;"> </br></br>
            

<span style="font-family: cambria;color:#006699;font-size:23px;"><font color="#435000"><b>Pharmacy Drug Registration Form</b></font></span> </br> </br>
            
                   
<div style="width:400px;background-color:;border:1px #ebf5ac solid;border-top-right-radius:8px;border-top-left-radius:8px;
border-bottom-right-radius:8px;border-bottom-left-radius:8px; ">
  
  <?php
$connection=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$connection);
if(isset($_POST['search']))
{
$dcode=$_POST['dcode'];
$sql="SELECT * FROM drugtable where dcode='$dcode'"; 
   $result=mysql_query($sql,$connection);
$data = mysql_fetch_object($result); 
}
 mysql_close($connection);
?>


<form action="drugsearch.php" method="post"  name="form1" id="form1" onsubmit="return checkvalidation()"><br/>

<table>
<tr><td><font color="#212b00" size="3">Drug Code:</font></td><td>
<input type="text" name="dcode" value="<?php echo $data->dcode ?>" onKeyPress="return onlyNum(event)" required/> </td></tr>

<tr><td><font color="#212b00" size="3">Drug Name:</font></td><td>
<input type="text" name="dname" id="dname" value="<?php echo $data->dname ?>" required/> </td></tr>
<tr><td><font color="#212b00" size="3">Company Name:</font></td><td>
<input type="text" name="cname" id="cname" value="<?php echo $data->cname ?>" required/> </td></tr>
   
<tr><td><font color="#212b00" size="3">Drug Type:</font></td>
<td>
<select name="drug_type" id="drug_type"  onkeypress="return chkAplha(event,'error12')" onblur="chkblnk('fn','error12')"required>
			 <option value="<?php echo $data->drug_type ?>"><?php echo $data->drug_type ?> </option>
			  <option>Tablet(PO)</option>
			  <option >Injectable</option>
    <option >Supp</option>
			  <option>Crame</option>
			  <option>Inhalation</option>
			</select> </td></tr>
<tr><td><font color="#212b00" size="3">Dosage:</font></td><td>
<input type="text" name="dosage" id="dosage" value="<?php echo $data->dosage ?>"  onKeyPress="return onlyNum(event)" required/> </td>
<td><input   style="width:19px;" type="text" value="mg" name="type" id="user_type" disabled="disabled"/>
</tr>
<tr><td><font color="#212b00" size="3">Quantity:</font></td><td>
<input type="text" name="quantity"   onKeyPress="return onlyNum(event)"required/> </td></tr>
     <tr><td><font color="#212b00" size="3">Unit_with:</font></td>
<td>
<select name="unit" id="unit"  onkeypress="return chkAplha(event,'error12')" onblur="chkblnk('fn','error12')"required>
			 <option value="<?php echo $data->unit ?>"><?php echo $data->unit ?></option>
			  <option>Box</option>
			  <option >Bottle</option>
    <option >PK</option>
			  <option>Tube</option>
			  <option>Roll</option>
     <option>Vial</option>
     <option>Apull</option>
			</select> </td></tr>
<tr><td><font color="#212b00" size="3">Shelf-No:</font></td><td>
<input type="text" name="shelf_no"  value="<?php echo $data->shelf_no ?>"  onKeyPress="return onlyNum(event)"required/> </td></tr>
<tr><td><font color="#212b00" size="3">Expiry date:</font></td><td>
<input type="text" class="tcal" name="expire_date" value="<?php echo $data->expire_date ?>"  required/> </td></tr>
</table></br></br>
<p align="right" id="btn-small" ><input class="button_example"style=margin-left:10px; type="submit" name="Submit" value="Register" />
 <input  class="button_example" type="reset" style=margin-top:00px; name="reset" align="right" value="Reset"  id="gobutton"  /></p>
</form>
</div>
<center>
<font color="#435000" size="1" face="Arial, Helvetica, sans-serif">
<b>---------------------------------------------<br/>
Pharmacy Drug Management System</b>
</font></center></br>


</div>




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
	
<?php
echo(Date(" F d,Y"));
?>
</div>
</body>
</html>
