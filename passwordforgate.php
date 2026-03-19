
<?php
	include("config.php");
 session_start();

 ?>

<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>IoT clinic</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="icon" href="img/icon/inst.png" type="image/x-icon" />
<link rel="shortcut icon" href="img/icon/inst.png" type="image/x-icon" />
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
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table  bgcolor="#E0FFFF"width="140" height="500" ><tr><td bgcolor="#808080">
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
       	</div>
      <div >
				<ul id="menu1">
					<li><a href="home.php" class="current" target="ifrm">Home</a></li>
        	<li><a href="about.php" class="current">About Us</a></li>
          	<li><a href="contact.php" class="current">Contact Us</a></li>
			<li><a href="feedback.php" class="current">FeedBack</a></li>
            	<li><a href="login.php" class="current">login</a></li>
			</ul>
		</div>
    <div id="main1">
		<div id="content">
		  <div class="flt1 cpinner">
		<div class="flt1 lp_boxbg" style="background-color:white;">

			 
		  

		   </div>

		<div  class="flt rp_block" style="margin-left:150px;">
			<center>
<div style="width:480px; background-color:#;border:px #b0c248 solid;border-top-right-radius:8px;border-top-left-radius:8px;
border-bottom-right-radius:8px;border-bottom-left-radius:8px"> </br>

<font  size="4px"color="#435000"><b>Forget password page</b></font> <br/> <br/>

 <!--PHP script-->
<?php
$con=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$con);
 if(isset($_POST['view']))
  {
    $uname=$_POST['user_name'];
   $email=$_POST['email'];
   $newpass=($_POST["password"]);
   $repass=($_POST["repass"]);  
   $pattern="/[\w\.]{6,}\@[a-zA_Z]{3,}\.[a-zA-Z\.]{2,}[^\.]$/";
   
   
 if($uname == ""){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp;plase Enter User name!!</font></p>";} 
elseif(!preg_match($pattern,$email))
{
$error="Inavalid email address";
   echo $error;
Header("location:passwordforgate.php?email=$error");
}

 elseif(strlen($_POST['password'])<=6 && strlen($_POST['repass'])<=6)
    {
		$error="Enter the password at least 7 Characters";
		   echo $error;
Header("location:passwordforgate.php?msgg=$error");
		}
	elseif(strcmp(($_POST['password']),($_POST['repass']))!=0)
    {
		$error="Password Not match";
        echo $error;
Header("location:passwordforgate.php?match=$error");		
}
else{
   
   $sql="SELECT * FROM account where user_name='$uname' AND email='$email'"; 
   $res=mysql_query($sql) or die("error".mysql_error());
if(mysql_num_rows($res)==0) 
{
$error="No such Attribut founds";
echo $error;
header("passwordforgate.php?msg=$error");
echo' <meta content="5;passwordforgate.php" http-equiv="refresh" />';
}
else{

$sqll="update account set Password='$newpass' where user_name='$uname'";
$res=mysql_query($sqll) or die("unable to change".mysql_error());
	$congra="You have reset your Password successfuly";
    echo $congra;
	echo '<br><br><br>';
	echo '<font color="red"><b>please wait........</b></font>';
	echo' <meta content="5;login.php" http-equiv="refresh" />';
	//header("location:login.php?reset=$congra");
}
}
}
else
{
?>
<div style="width:560px;background-color:#E4F0cd;border:1px #ebf5ac solid;border-top-right-radius:8px;border-top-left-radius:8px;
border-bottom-right-radius:8px;border-bottom-left-radius:8px; "><br/> 
<form align="left" action="passwordforgate.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="javascript:return validate('form1','emp_email');">

<table>
<tr><td><font color="#212b00" size="3">User Name:</font></td><td><input type="text" name="user_name" required x-moz-errormessage="Enter Your User name"/><?php if(isset($_GET['user'])) echo $_GET['user']?> </td></tr>
<tr><td><font color="#212b00" size="3">Email:</font></td><td><input type="text" name="email"  required/><?php if(isset($_GET['email']))echo $_GET['email'] ?> </td></tr>
<tr><td><font color="#212b00" size="3">Password:</font></td><td><input type="password" name="password" required/> <?php if(isset($_GET['msgg'])) echo $_GET['msgg']?></td></tr>
<tr><td><font color="#212b00" size="3">Repassword:</font></td><td><input type="password" name="repass" required/><?php if(isset($_GET['match']))echo $_GET['match'] ?> </td></tr>
<tr><td></td></tr>
</table><br/><center>
<p align="right"><input type="submit" name="view" value="Reset"   class="button_example"/>
<input type="reset" value="Cancle"  class="button_example"/><?php if(isset($_GET['reset']))echo $_GET['reset'] ?></p></center>
</form>
</div>
<font color="#435000" size="1" face="Arial, Helvetica, sans-serif">
<b>---------------------------------------------<br/>
Clinic Management System</b>
</font>
 <?php } ?><br/>
  
<!--End of PHP-->            
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
