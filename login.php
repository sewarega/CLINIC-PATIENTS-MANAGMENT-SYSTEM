<?php
	include("config.php");
 session_start();
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
<script type="text/javascript" src="jquery.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="icon" href="img/icon/inst.png" type="image/x-icon" />
<link rel="shortcut icon" href="img/icon/inst.png" type="image/x-icon" />
<style>
body{

		font-family:arial;
		}
 legend{
		color:rgb(137, 206, 153);width:90%;
		clear:both;margin-left:40px;
		}
#lined{
		float:left;margin:5px;clear:both;
		display:inline;font-weight:bold;
		font-size:16px;margin-left:20px;
		}
.LoginPack{
		width:390px;float:left;
		margin-left:1px;
		border:px silver solid;
		height:250px;margin:0% 20% 0% 10%;
		padding:30px;border-radius:10;font-size:18px;;
		}
input[type="text"],input[type="password"] {
		padding:10px;font-size:14px;
		width:330px;text-transform:capitalize}
select {
		padding:10px;font-size:19px;width:350px;height:45px;
		}
#logbtn{
		float:left;margin:8% 0% 5% 43%;
		padding:20px 20px 20px 20px;
		border-radius:20px;font-size:18px;
		font-weight:bold;}
</style>
<script type="text/javascript">
function change_char(){
	var Password = document.getElementById("mfn");
	var checkbox = document.getElementById("cb");
	if(Password.type == "password"){
		Password.type = "text";
		checkbox.checked = true;
	}else{
		Password.type = "password";
		checkbox.checked = false;
	}
}
	</script>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table  bgcolor="#E0FFFF" width="150" height="675" ><tr><td bgcolor="#808080">
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
				<li><a href="home.php" class="current">Home</a></li>
        	<li><a href="about.php" class="current">About Us</a></li>
          	<li><a href="contact.php" class="current">Contact Us</a></li>
			<li><a href="feedback.php" class="current">Feedback</a></li>
            	<li><a href="login.php" class="current">login</a></li>
			</ul>
		</div>
    <div id="main1">
		<div id="content">
		  <div class="flt1 cpinner">
		  		<div class="flt1 lp_boxbg" style="background-color:white;margin-right:1px"> <br/></br>
				<img src="images/login.jpg"  height="150" width=200px">
		  </div>
		<div  class="flt rp_block" style="margin-left:px;border:px solid silver;">	
		<h3 style="float:left;margin:7% 0% 0% 20%;color:black;"> Users</h3>
 <img src="images/login-icon.jpg"  height="37" style="float:left;margin:5% 0% 0% 0%;color:black;width:90px;">
  <form class="LoginPack" method="POST" action="login.php">
<div id="lined">
        <label for="mn" size="3"><b>User Name</b> </label>
		<div class="input-prepend"><span class="add-on"><i class="icon icon-user"></i></span>
        <input  type="text" id="sid" name="user_name" required x-moz-errormessage="Please Enter your User Name" placeholder="Enter your user name here">
		 </div>
       </div>
<div id="lined">
<label for="mfn" size="3"><b>Password</b> </label>
		<div class="input-prepend"><span class="add-on"><i class="icon icon-lock"></i></span>
        <input type="password" id="mfn" name="Password" required x-moz-errormessage="Please enter the Password" placeholder="Enter your Password here">
		</div>
       </div>
	   <p align="right"><input type="checkbox" name="checkbox" id="cb" onClick="change_char();"> Show Characters</p>
       <div style="clear:both"></div>
  <p align="center">
<div style="clear:both;size:20%">
  <p style="align:center";>
  <li ><a HREF="passwordforgate.php">Forgot Password?</a></li><input type="submit" name="login" style="float:left;margin:0% 0% 25% 70%;font-size:18px;"class="button_example" value="Login">
  </p>

</div>
</p>
       </form></br></br>
	   <div style="margin-top:352px">
	   <?php
	   $conn=mysqli_connect('localhost','root','','Auclinic_database')
	   ?>
 <?php
	   if (isset($_POST['login'])){ 
	    $user_name=$_POST['user_name'];
	    $_SESSION['user_name']=$_POST['user_name'];
		
	    $password=($_POST['Password']);
	    $_SESSION['Password']=$_POST['Password'];
		 // To protect MySQL injection (more detail about MySQL injection)
       $user_name =stripslashes($user_name);
	   $password=stripslashes($password);
	   
	   $user_name =mysqli_real_escape_string($conn,$user_name);
	   $password=mysqli_real_escape_string($conn,$password);
	   
	   $sql = "SELECT * FROM account WHERE user_name='$user_name' AND Password='$password'";
	   $result = mysqli_query($conn,$sql); 
		$rowCheck =mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		
		$status=$row['status'];
		
		 if($row['user_type']=='Admin'){ 
		 if($status==1)
		{
		$_SESSION['password']=$row['password'];
		$_SESSION['user_name']=$row['user_name'];
         echo "<script>window.location='admin.php';</script>";
			} 
			else
		{
		echo'<p class="wrong"> Your Account is not active Please contact the system Admin 1</p>';                                
		echo' <meta content="4;login.php" http-equiv="refresh" />';	
		}
		}	
		
			else if($row['user_type']=='Doctor'){
                        if($status==1)
		{	
	$_SESSION['user_name']=$row['user_name'];
	$_SESSION['Password']=$row['Password'];
	
        echo'  <meta content="1;doctorpage.php" http-equiv="refresh" />';
			}
			else
		{
		echo'  <p class="wrong"> Your Account is not active Please contact the system Admin 2</p>';                                
		   echo' <meta content="4;login.php" http-equiv="refresh" />';	
		   
		}
		}
	  else if($row['user_type']=='pharmasist'){
          if($status==1)
		{	
	$_SESSION['user_name']=$row['user_name'];
	$_SESSION['Password']=$row['Password'];
		
         echo'  <meta content="1;pharmacist.php" http-equiv="refresh" />';
			}
			else
		{
		echo'  <p class="wrong"> Your Account is not active Please contact the system Admin 3</p>';                                
		echo' <meta content="4;login.php" http-equiv="refresh" />';	
		   
		}
		}
	  else if($row['user_type']=='clerk'){
          if($status==1)
		{
	        $_SESSION['user_name']=$row['user_name'];
		$_SESSION['Password']=$row['Password'];
                echo'  <meta content="1;clerkpage.php" http-equiv="refresh" />';
			}
			else
		{
		echo' <p class="wrong"> Your Account is not active Please contact the  system Admin 4</p>';                                
	        echo' <meta content="4;login.php" http-equiv="refresh" />';	
		}
		}
		
		
	  else if($row['user_type']=='Lab tecnitian'){
          if($status==1)
		{
		$_SESSION['user_name']=$row['user_name'];	
		$_SESSION['Password']=$row['Password'];
		
           echo'  <meta content="1;labratoristpage.php" http-equiv="refresh" />';
			}
			else
		{
		echo' <p class="wrong"> Your Account is not active Please contact the  system Admin 5</p>';                                
		echo' <meta content="4;login.php" http-equiv="refresh" />';	
		}
		}
	 
	 
		else 
                {
		echo'<br>';
       echo'  <p class="wrong">Check Your user name or Password</p>';     
       echo' <meta content="5;login.php" />';		   
		}
		  }
    mysqli_close($conn);
    ?>	 </div> 

 </br></br></br>

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
