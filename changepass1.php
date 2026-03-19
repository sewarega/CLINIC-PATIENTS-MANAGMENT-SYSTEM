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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		
<script type="text/javascript" src="jquery.js"></script>

<style>
body{
		font-family:cambria;
		}
input[type="text"],input[type="password"] {
		padding:0px;font-size:13px;height:3opx;
		width:170px;text-transform:capitalize}
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
	<table  bgcolor="#E0FFFF"width="148" height="650" ><tr><td bgcolor="#808080">
	
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
					
						<li><a href="logout.php">logout</a></li>
						
						
					</ul>
			       	
		</div> 
    <div id="main1">
		<div id="content">
		
		  <div class="flt1 cpinner">
		  
		<div class="flt1 lp_boxbg" style="background-color:white;"> <span class="flt1 lp_txtour">About Password</span><br />
         <span class="flt1 lp_boxtxt">You want to change password you must put first the correct user name ,old password in to the fields and new password and verify the new password</span><br />
		  </div>
			<div  class="flt rp_block" style="margin-left:10px;">	
			
     <div  style="margin-left:0px;height:350px;">
										
		<span style="font-family:cambria;color:black;font-size:20px;">User Change Password Page</span>			
<div style="width:420px; height:270px; margin:0 auto; position:relative; border:1px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:10px;">

  <form  name="change" method="POST" action="changepass1.php" onsubmit="return validateForm()">
 <table width="350" align="center" valign="top">
  <tr>
    <td colspan="2"><div style="font-family:monotype corsiva, Helvetica, sans-serif;color:black; font-size:18px;">All Field must be filled up</div></td>
  </tr></br>
  		 <tr>
	     <td class='para1_text' width="220px"><font color="red"></font>User Name:</td>
		 <td><input type="text" name="user_name" required x-moz-errormessage="Enter User Name" ></td>
	     </tr>
		 <tr>
	     <td class='para1_text' width="220px"><font color="red"></font> Old Password:</td>
		 <td><input type="password" name="old_password" required x-moz-errormessage="Enter Old password" ></td>
	     </tr>
         <tr>
	     <td class='para1_text' width="220px"><font color="red"></font> New Password:</td>
		 <td><input type="password" name="new_password" required x-moz-errormessage="Enter New Password" ></td>
	     </tr>
		 <tr>
	     <td class='para1_text' width="220px"><font color="red"></font> Confirm Password:</td>
		 <td><input type="password" name="confirm_password" required x-moz-errormessage="Re-type your Password" ></td>
	     </tr><br/><br/>
  <tr>
    <td>&nbsp;</td>
	<br>
    <td><input type="submit" name="password" value="Change Password" class="button_example"/></td>
  </tr>
</table>
  </form>
  <?php
if(isset($_POST['password']))
{
include('config.php');
$user=$_POST['user_name'];
$oldpass = $_POST['old_password'];
$newpass = $_POST['new_password'];
$confirmpass = $_POST['confirm_password'];
$conn=mysql_connect("localhost","root","");
if(!$conn){
die("error connection to db server".mysql_error());
}
$dbselect=mysql_select_db("Auclinic_database", $conn);
if(!$dbselect){
die("error in selecting database ".mysql_error());
}
if($user == ""){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp;plase Enter user name!!</font></p>";}
		elseif($oldpass == ""){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp; Plase Enter Old password!!</font></p>";}
		elseif($newpass == ""){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp; Plase Enter New password!!</font></p>";}
		elseif($confirmpass == ""){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp;Plase Confirm password!!</font></p>";}
		
		elseif($newpass != $confirmpass){
echo"<p  style='color:red;margin-left:30px;'><font color='red' size='4'><img src='img/error.png' width='20px'
height='20px'>&nbsp;Password did not match!!</font></p>";
		}
		else{
$query="select * from account where user_name='{$user}' AND Password='{$oldpass}' ";
$result=mysql_query($query);
if(!$result){
die("query faile".mysql_error());
}
if(mysql_num_rows($result)==1){
    if($newpass!=$confirmpass){
	       echo'  <p class="wrong">New Password and Confirm Password does not Match!</p>';                                
		   echo' <meta content="5;changepass1.php" http-equiv="refresh" />';
		   }
		   else
		   {
  $query="update account set Password='{$newpass}' where user_name='{$user}' AND Password='{$oldpass}'";
        $result=mysql_query($query);
		 echo'  <p class="success"> Your password has been changed successfuly!</p>';
         echo' <meta content="7;changepass1.php" http-equiv="refresh" />';  
   }
   }
else
{
 echo'  <p class="wrong">Wrong user name or old password!!</p>';
 echo' <meta content="5;changepass1.php" http-equiv="refresh" />';
}
}}
?>
  </div>

</div>
 </br></br></br>

<li><a href="home.php">Back</a></li><br />
			
		 
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