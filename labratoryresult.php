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
 <!--<?php
$unam=$_SESSION['user_id'];
$result=mysql_query("SELECT * FROM  account WHERE 	user_id='$unam'")or die(mysql_error);
$row=mysql_fetch_array($result);
$FirstName=$row['fname'];
$LName=$row['lname'];
$user_name=$row['user_name'];
?>-->
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
<script type="text/javascript" src="jquery.js"></script>
<script type='text/javascript'>
function checkvalidation()
{
	var textarea = document.getElementById('textarea');
      var ltname = document.getElementById('ltname');
	  if(isAlphabet(  textarea, "Please fill Lab Result Name in letters only")){
		  if(lengthRestriction( textarea, 2, "for Lab Result Name")){
		if(isAlphabet(ltname, "please fill Lab Technician Name in letters only")){  
	if(lengthRestrictionn(ltname, 3, 30,"for Lab technician name")){
		 return true;
		  }}}
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
	}}
	function lengthRestriction(elem, min, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min){
		return true;
	}else{
		alert("Please enter at least " +min+ " characters" +helperMsg);
		elem.focus();
		return false;
	}
}
function lengthRestrictionn(elem, min, max, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters" +helperMsg);
		elem.focus();
		return false;
	}
}
</script>
<style>
body{
		font-family:cambria;
		}
input[type="text"],input[type="password"] {
		padding:0px;font-size:13px;
		width:170px;height:26px;text-transform:capitalize}
textarea {
		padding:0px;font-size:13px;width:170px;height:40px;text-transform:capitalize;
		}
</style>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table bgcolor="#E0FFFF"width="150" height="800" ><tr><td bgcolor="#808080">
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
				<li><a href="#">Lab Operation</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="checklabreport.php">Check lab request</a></li>
						<li><a href="labratoryresult.php">Register test result</a></li>										
					</ul>
				</li>
				<li><a href="labreport.php">Generat Lab report </a></li>
				<li><a href="dehp">Account Setting</a>
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
		<div class="flt1 lp_boxbg">     
<h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on labratory result page</li>
					<li><a href="labratoristpage.php">Back</a></li><br />
    </h6>		
		<img src="img/l.JPG" class="img-circ"width="200px" height="150px"><br><hr>
		<span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct or test blood to patient operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
          <img src="img/l1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
		    </div>
			<div  class="flt rp_block" style="margin-left:20px;">	
			 <div  style="width:600px;align:center; margin:0 auto; position:relative; border:1px #ebf5ac solid; ">
 <span style="font-family: cambria, Helvetica, sans-serif;color:#006699;font-size:23px;">Laboratory Result Form </span><br />
		
			<form action="labratoryresult.php" method="post" name="abc" onsubmit="return checkvalidation()">
			  <table width="500px" align="center">
  <tr>
    <td colspan="2"><div style="font-family:monotype corsiva, Helvetica, sans-serif;color:black; font-size:25px;">All Field must be filled up</div></br></br></td>
  </tr></br>
  <tr>
  <td width="120" valign="top"><div align="right">Patient ID:</div></td>
        <td width="236"><input type="text" name="patient_id" id="patient_id" required="required">       
        </td></tr>
			  <tr >
                <td width="150" valign="top"><div align="right">Lab result description:</div></td>
                <td> <label for="textarea"></label>
                          <textarea name="labresultdes" id="textarea" cols="11" rows="1" required="required" ></textarea></td>
              </tr>
			   <tr>
                <td valign="top"><div align="right">Lap Test Date:</div></td>
                <td><input type="text" name="ltdate" id="ltdate" class="tcal"  required="required"></br></td></br></br>     
             </tr>
			  <tr>
                <td valign="top" ><div align="right">Lab technician name:</div></td>
                <td colspan="2"><input type="text"  id="ltname" name="ltname"  value="<?php print($FirstName).'&nbsp;&nbsp;'.($LName) ?> " required="required" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				       Sign:<input type="checkbox" name="sign" id="textfield2" value="checked" required="required"></br></br></td>
                    </tr>                    
                <tr>
                <td valign="top">&nbsp;</td>
                <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit"  class="button_example"/>&nbsp;&nbsp;&nbsp;&nbsp;
				 <input type="reset" name="reset" value="Reset"  class="button_example"/></td>
                 </tr>
                 </table>       
                 </form>
				 </div>
				 <center>
				 <?php

	$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db 
 
if(isset($_POST['Submit']))
{
$pid=$_POST['patient_id'];
$rx=$_POST['labresultdes'];
$ltdate=$_POST['ltdate'];

$ltname=$_POST['ltname'];
$sign=$_POST['sign'];
$res=mysql_query("INSERT INTO labresulttable(patient_id,labresultdes,ltdate,ltname,sign) values('$pid','$rx','$ltdate','$ltname','$sign')");
if($res )
	{
echo "<font face='arial' align='center' color='black' size='4'><img src='img/tick.png' width='25px' height='25px'>&nbsp;&nbsp;Laboratory testing result succefully registered !!!</font>";

echo'<meta content="7;labratoryresult.php" http-equiv="refresh" />';
	}
	else
	{
	echo"<font color='green' size='4'><img src='img/error.png' width='20px' height='20px'>&nbsp;<p align='center'>The opration failed Please 'Try again'</p></font>";
	}
	}
mysql_close($conn);
?>
 </center></br></br></br>
	 
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