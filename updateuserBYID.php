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
	include("validation/userupdate.php");

 ?>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table bgcolor="#E0FFFF"width="130" height="950" ><tr><td bgcolor="#808080">
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
			<li ><a href="home.php">Home</a></li>
			<li ><a href="">Manag Account</a>
			<ul>
                    <li><a href="userreg.php"><span>Register User</span></a></li>
                      <li><a href='searchuser.php'><span>Search User </span></a></li>
                      <li><a href='updateuserserch.php'><span>Update User</span></a></li>
			  </ul>
			   </li>
			<li><a href="">Other operation</a>
			  <ul>
			  <li><a href="monitoraccount.php">Control Account</a></li>
			  <li><a href="accoutadmin.php">Create Account</a></li>
			<li><a href="deleteAccount.php">Delete Account</a></li>
			<li><a href="changepass1.php">Change password</a></li>
						<li><a href="logout.php">Logout</a></li>
			 </ul>
			</li>
			</ul>  
		</div> 
    <div id="main1">
		<div id="content">
		 <div class="flt1 cpinner">
		  
		 <div class="flt1 lp_boxbg"> <br />
		  <h5 align="left"><li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
    </h5>
		 <h5><b>
<li><a href="userreg.php"><span>Register User</span></a></li>
                      <li><a href='searchuser.php'><span>Search User </span></a></li>
                      <li><a href='updateuserserch.php'><span>Update User</span></a></li></b></h5>
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
				$marrr = $_POST['mariage_status'];
				$address = $_POST['address'];
				$phone = $_POST['phone_no'];
				$salary = $_POST['salary'];	
				mysql_query("UPDATE user SET fname = '$fname',lname = '$lname',sex = '$sex', age = '$age', mariage_status = '$marrr', address = '$address',phone_no = '$phone', salary = '$salary' WHERE user_id = '$id'") or die(mysql_error()); 
				echo "<font color='black' size='4'><p class=''><img src='img/tick.png' width='25px' height='25px'>&nbsp;The User information succefully updated!!!</p></font>";
			echo'<meta content="7;updateuserserch.php" http-equiv="refresh" />';	
			endif;
			$result = mysql_query("SELECT * FROM user WHERE user_id='$id'");
			$data = mysql_fetch_object( $result ); 
			?>
			<form name="myform" action="" method="POST"  bgcolor="#f076ff" border="0" cellspacing="2"  onsubmit="return checkvalidation()" >
			<table  class='' >
			<tr>
			<tr><td>User_ID:</td><td width="130px" align="center"><input type="text" name='user_id' class="input-xxlarge" value="<?php echo $data->user_id?>" disabled="disabled"></td></tr>
			<tr><td>FName:</td><td width="130px" align="center">
				<input type="text" value="<?php echo $data->fname ?>"  id="fname" name="fname" /></td></tr></br>
			<tr><td>LName:</td><td width="130px" align="center"></br>
				<input type="text" value="<?php echo $data->lname ?>" id="lname" name="lname"/></td></tr></br>
			<tr><td>Gender:</td><td width="130px" align="center">
				<select class="span2" name="sex" id="sex">
					<?php if($data->sex=='Male'): ?>
						<option value="Male" selected>Male</option>
						<option value="Female">Female</option>
					<?php else: ?>
						<option value="Male">Male</option>
						<option value="Female" selected>Female</option>
					<?php endif; ?>
				</select></td></tr></br>
				<tr><td>Age:</td><td width="130px" align="center">
				<input type="text" name="age" id="age"value="<?php echo $data->age ?>"></td></tr></br>
			<tr><td>Mariage_status:</td><td width="130px" align="center">
			<select class="span2" name="mariage_status" id="mariage_status">
					<?php if($data->mariage_status=='Single'): ?>
						<option value="Single" selected>Single</option>
						<option value="Marriage">Marriage</option>
					<?php else: ?>
						<option value="Single">Single</option>
						<option value="Marriage" selected>Marriage</option>
					<?php endif; ?>
				</select>
			
			
				</td></tr></br>
			 <tr><td>Address:</td><td width="130px" align="center">
			   
				<input type="text" name="address" id="address" value="<?php echo $data->address ?>"></td></tr></br>
			   <tr><td>Phone_No:</td><td width="130px" align="center">
			   
				<input type="text" name="phone_no" id="phone_no"value="<?php echo $data->phone_no ?>"></td></tr></br>
				<tr><td>Salary:</td><td width="130px" align="center">
			   
				<input type="text" name="salary" id="salary"value="<?php echo $data->salary ?>"></td></tr></br>
             
			<tr ><td colspan=2 align="right"><input type='submit' name="update" value='Save Change' class="button_example"></tr></td>
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