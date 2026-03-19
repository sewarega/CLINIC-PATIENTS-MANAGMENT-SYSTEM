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
<style>
body{
		font-family:cambria;
		}
input[type="text"],input[type="password"] {
		padding:0px;font-size:13px;
		width:170px;height:px;text-transform:capitalize}
select {
		padding:0px;font-size:13px;width:150px;height:px;
		}

</style>
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
<div id="cal">
<?php
ob_start();
?>
<table width="150" >

	<tr>
	<table border="" bgcolor="#E0FFFF"width="150" height="910" ><tr><td bgcolor="#808080">
	<h2 align="center">Calender</h2></td> </tr> 
	<tr ><td bgcolor="#1f618d" >
	<?php
$date = strtotime(date("Y-m-d"));

$day = date('d', $date);
$month = date('m', $date);
$year = date('Y', $date);
$firstDay = mktime(0,0,0,$month, 1, $year);
$title = strftime('%B', $firstDay);
$dayOfWeek = date('D', $firstDay);
$daysInMonth = cal_days_in_month(0, $month, $year);
/* Get the name of the week days */
$timestamp = strtotime('next Sunday');
$weekDays = array();
for ($i = 0; $i < 7; $i++) {
//$weekDays[] = strftime('%a', $timestamp);
	$timestamp = strtotime('+1 day', $timestamp);
}
$blank = date('w', strtotime("{$year}-{$month}-01"));
?>
<table width="80">
	<tr>
		<th colspan="7" class="text-center" bgcolor="white"> <?php echo $day ?> <?php echo $title ?>   <?php echo $year ?> </th>
		
	</tr>
	<tr><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>
	<tr>
		<?php foreach($weekDays as $key => $weekDay) : ?>
			<td><?php echo $weekDay ?></td>
		<?php endforeach ?>
	</tr>
	<tr>
		<?php for($i = 0; $i < $blank; $i++): ?>
			<td></td>
		<?php endfor; ?>
		<?php for($i = 1; $i <= $daysInMonth; $i++): ?>
			<?php if($day == $i): ?>
				<td bgcolor="#808080"><strong><?php echo $i ?></strong></td>
			<?php else: ?>
				<td><?php echo $i ?></td>
			<?php endif; ?>
			<?php if(($i + $blank) % 7 == 0): ?>
				</tr><tr>
			<?php endif; ?>
		<?php endfor; ?>
		<?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
			<td></td>
		<?php endfor; ?>
	</tr>
	</td>
	</tr>
	</table>
	
<br><br><br><br>
	<script language="JavaScript">
              if (document.all||document.getElementById)
         document.write('<span id="worldclock" style="font:bold 20px Arial;fontcolor:white;"></span><br>')

             zone=0;
       isitlocal=true;
           ampm='';

        function updateclock(z){
              zone=z.options[z.selectedIndex].value;
            isitlocal=(z.options[0].selected)?true:false;
        }

    function WorldClock(){
            now=new Date();
              ofst=now.getTimezoneOffset()/60;
          secs=now.getSeconds();
            sec=-1.57+Math.PI*secs/30;
            mins=now.getMinutes();
       min=-1.57+Math.PI*mins/30;
           hr=(isitlocal)?now.getHours():(now.getHours() + parseInt(ofst)) + parseInt(zone);
            hrs=-1.575+Math.PI*hr/6+Math.PI*parseInt(now.getMinutes())/360;
        if (hr < 0) hr+=24;
               if (hr > 23) hr-=24;
          ampm = (hr > 11)?"PM":"AM";
             statusampm = ampm.toLowerCase();

      hr2 = hr;
     if (hr2 == 0) hr2=12;
         (hr2 < 13)?hr2:hr2 %= 12;
        if (hr2<10) hr2="0"+hr2

          var finaltime=hr2+':'+((mins < 10)?"0"+mins:mins)+':'+((secs < 10)?"0"+secs:secs)+' '+statusampm;

          if (document.all)
           worldclock.innerHTML=finaltime
           else if (document.getElementById)
       document.getElementById("worldclock").innerHTML=finaltime
           else if (document.layers){
         document.worldclockns.document.worldclockns2.document.write(finaltime)
       document.worldclockns.document.worldclockns2.document.close()
      }
      setTimeout('WorldClock()',1000);
    }
		window.onload=WorldClock
          //-->
		days = new Array(7)
		days[1] = "Sunday";
		days[2] = "Monday";
		days[3] = "Tuesday"; 
		days[4] = "Wednesday";
		days[5] = "Thursday";
		days[6] = "Friday";
		days[7] = "Saturday";
		months = new Array(12)
		months[1] = "January";
		months[2] = "February";
		months[3] = "March";
		months[4] = "April";
		months[5] = "May";
		months[6] = "June";
		months[7] = "July";
		months[8] = "August";
		months[9] = "September";
		months[10] = "October"; 
		months[11] = "November";
		months[12] = "December";
		today = new Date(); day = days[today.getDay() + 1]
		month = months[today.getMonth() + 1]
		date = today.getDate()
		year=today.getYear(); 
		if (year < 2000)
		year = year + 1900;
		document.write ("<font size=-1 face='Arial, Helvetica, sans-serif' color=white> "+ day +
		", " + month + " " + date + ", " + year + "</font>")
		</script>
	
	</td>
	</tr>
	</table>
	</tr>
</table>
<br>
<style>
a:hover{
				background:#E0FFFF;
				color:black;
				text-align:center;
				text-decoration: underline;								
				}
</style>

</div>
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
				<li><a href="logout.php">logout</a></li>
			</ul>
		</div>
    <div id="main1">
		<div id="content">
		<div class="flt1 cpinner">
		<div class="flt1 lp_boxbg" style="background-color:white;">
			<h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on durg register page</li>
					<li><a href="pharmacist.php">Back</a></li><br />
    </h6>
		</br></br>
		<span style="font-family: cambria;color:#006699;font-size:23px;">About Drugs</span><br />
        A pharmaceutical drug (medicine or medication and officially medicinal product) is a drug used in health care. Such drugs aid the diagnosis, cure, treatment, or prevention of disease. <br /> <BR/>
		<img src="img/d1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
			<ul id="dropdow">
				
						<li><a href="updatedrug.php"><span style="font-size:15px;">Update Drug</span></a></li>
				
				<li><a href="checkexpire.php"><span style="font-size:15px;">Check Expire Date</span> </a></li>
						<li><a href="pharmacyreport.php"><span style="font-size:15px;">Generate Report</span></a></li>
						<li><a href="checkprescreptionrequest.php"><span style="font-size:15px;">Check request</span></a></li>
						<li><a href="drugdeliver.php"><span style="font-size:15px;">Deliver drug</span></a></li>
                        <li><a href="export/exledeliver.php">Export deliver drug info</a></li>
							  </div>

			<div  class="flt rp_block" style="margin-left:30px;">
			<div style="margin-left:100px;margin-top:0px;">	<p align="right"> Add drug<a href="drugsearch.php"><img src="img/next.PNG" class="img-circl"width="30px" height="20px" title="Add Drug"></a> </p>
			</div>  <div class="cleaner"></div>

<div style="width:480px; background-color:;border:px #b0c248 solid;border-top-right-radius:8px;border-top-left-radius:8px;
            border-bottom-right-radius:8px;border-bottom-left-radius:8p;margin-left:50px;"> </br></br>
            

<span style="font-family: ;color:#212b00;font-size:23px;"><font color="#212b00">Pharmacy Drug Registration Form</font></span> </br> 
      		   
            <?php
$connection=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$connection);
if(isset($_POST['Submit']))
{
$dcode=$_POST['dcode'];
$dname=$_POST['dname'];
$cname=$_POST['cname'];
$drug_type=$_POST['drug_type'];



$dosage=$_POST['dosage'].$_POST['type'];
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
echo"<font size='4px' color='green'><img src='img/tick.png' width='25px' height='25px'>&nbsp;&nbsp;<p class='right'>Updated Drug seccessfilly!!!</p></font>";
echo' <meta content="7;drugregister.php" http-equiv="refresh" />';
}
}
else{
$res=mysql_query("INSERT INTO drugtable values('$dcode','$dname','$cname','$drug_type','$dosage','$quantity','$unit','$shelfno','$exdate') ");
if(!$res)
	{
echo"<font size='4px' color='red'><p class='wrong'>Insertion failed , Please change Drug Code!!!</p></font>";
echo' <meta content="8;drugregister.php" http-equiv="refresh" />';
	}
	else
	{

echo"<font size='4px' color='green'><img src='img/tick.png' width='25px' height='25px'>&nbsp;&nbsp;<p class='right'>You have succefully registered drug in to your data base!!!</p></font>";
echo' <meta content="7;drugregister.php" http-equiv="refresh" />';
	}
}
}
 mysql_close($connection);
?>  <hr>         
<div style="width:400px;background-color:;border:px #ebf5ac solid;border-top-right-radius:8px;border-top-left-radius:8px;
border-bottom-right-radius:8px;border-bottom-left-radius:8px; ">
<form action="drugregister.php" method="post"  name="form1" id="form1" onsubmit="return checkvalidation()"><br/>

<table>
<tr><td><font color="#212b00" size="3">Drug Code:</font></td><td>
<input type="text" name="dcode"  maxlength="12" onKeyPress="return onlyNum(event)" required/> </td></tr>

<tr><td><font color="#212b00" size="3">Drug Name:</font></td><td>
<input type="text" name="dname" id="dname" required/> </td></tr>
<tr><td><font color="#212b00" size="3">Company Name:</font></td><td>
<input type="text" name="cname" id="cname" required/> </td></tr>
   
<tr><td><font color="#212b00" size="3">Drug Type:</font></td>
<td>
<select name="drug_type" id="drug_type" onkeypress="return chkAplha(event,'error12')" onblur="chkblnk('fn','error12')"required>
			 <option value="it">Select drug_type </option>
			  <option>Tablet(PO)</option>
			  <option >Injectable</option>
    <option >Supp</option>
			  <option>Crame</option>
			  <option>Inhalation</option>
			</select> </td></tr>
<tr><td><font color="#212b00" size="3">Dosage:</font></td>
<td><input type="text" name="dosage" id="dosage" required/> </td>
<td><input   style="width:19px;" type="text" value="mg" name="type" id="user_type" /></td></br>
</tr>
<tr><td><font color="#212b00" size="3">Quantity:</font></td><td>
<input type="text" name="quantity"  maxlength="12" onKeyPress="return onlyNum(event)"required/> </td></tr>
     <tr><td><font color="#212b00" size="3">Unit_with:</font></td>
<td>
<select name="unit" id="unit" onkeypress="return chkAplha(event,'error12')" onblur="chkblnk('fn','error12')"required>
			 <option value="it">Select_unit </option>
			  <option>Box</option>
			  <option >Bottle</option>
    <option >PK</option>
			  <option>Tube</option>
			  <option>Roll</option>
     <option>Vial</option>
     <option>Apull</option>
			</select> </td></tr>
<tr><td><font color="#212b00" size="3">Shelf-No:</font></td><td>
<input type="text" name="shelf_no"  maxlength="12" onKeyPress="return onlyNum(event)"required/> </td></tr>
<tr><td><font color="#212b00" size="3">Expiry date:</font></td><td>
<input type="text" class="tcal" name="expire_date"  required/> </td></tr>
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
