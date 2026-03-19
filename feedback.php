<?php
	include("config.php");
 session_start();

 ?>

<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	

<title>clinic</title>


<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<script>
function verifyEmail(){

var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
     if (document.alokm.email.value.search(emailRegEx) == -1) {
          alert("Please enter a valid email address.");
     }
     return false;
}
</script>
<script type='text/javascript'>
function checkvalidation()
{
	
	
	var name = document.getElementById('name');
      var email = document.getElementById('email');
    var message = document.getElementById('message');
	if(isAlphabet( name, "Please fill your  Name in letters only")){
		  if(lengthRestriction( name, 3, 30,"for your  name")){
			  if(isAlphabet( message, "Please fill your message in letters only")){
		  if(lengthRestriction( message, 4, 30,"for your message")){
	if(emailValidator( email,"check your e-mail format Example jone@gmail.com/yahoo.com")){
		return true;
	}}
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
	function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}
	else
	{
		alert(helperMsg);
		elem.focus();
		return false;
}
}

function lengthRestriction(elem, min, max, helperMsg){
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
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table bgcolor="#E0FFFF"width="120" height="1000" ><tr><td bgcolor="#808080">
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

		<div class="flt1 lp_boxbg" style="background-color:white;"> <span class="flt1 lp_txtour">AU IOT-Clinic Office</span><br /><br /><br />
		
        
         <img src="images/lp_boxcorn2.gif" width="258" height="12" alt="" class="flt1 lp_boxtop2" /> <img src="images/lp_boxcorn3.gif" width="260" height="15" alt="" class="flt1 lp_boxtop3" />
        <div class="flt1 lp_box2bg"> <img src="images/lp_imgclient.jpg" width="45" height="40" alt="" class="flt1 lp_imgclient" /> 
		<span class="flt lp_txtclint">client speaks</span> <span class="flt1 lp_box2txt">&#8220;If you have any questions, comments or concerns about our
					  services, please to contact us..&#8221;<br />
            <span style="float:right; color:#F3FF9F;">-AU IOT Clinic Office</span></span> </div>
<img src="images/lp_boxcorn4.gif" width="260" height="14" alt="" class="flt1" /><br><br><hr>
		  </div>
			<div  class="flt rp_block" style="margin-left:27px;">



<p style="font-size:24px;color:#35b128;font-family:cambria;">Latest comments:</p>
<div   style="margin-left:40px;width:540px"">
		 <table border='0' class='' >
		
		
<?php
		 $dbname="";
		 $dbcommnt="";
		 $dbdatee="";
		 mysql_connect('localhost','root','');
		 mysql_select_db('Auclinic_database');
		$results = mysql_query("SELECT * from comment order by name DESC LIMIT 7");
		while($row=mysql_fetch_array($results))
		{
			$dbname=$row['name'];
			$dbcommn=$row['message'];
			$dbdatee=$row['Date'];
			echo"<tr>
			  <td><b>Name: </b>{$dbname}</td>
			     </tr>
				 ";
			echo"<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$dbcommn}&nbsp;&nbsp;&nbsp;&nbsp;<br/><br/><font color='red' size='3'><b>Date: </b>{$dbdatee}</font></td>
			</tr>";
			
		}
		
		
		?>
		</table><br><hr>
		
		 
        			<div class="grid_8">
               
						
					  <div align="justify" style="width:px;">If you have any questions, comments or concerns about our
					  services, please don't hesitate to contact us. We ensure that we will make your stay here an
					  enjoyable and pleasant experience.</div>
					  
        				<h5><font color="black">Quick Contact</font></h5>


        <form action="feedback.php"  method="POST" target="_blank" onsubmit="return checkvalidation()">
        					<p>
        						Name:<br>

        						<input type="text" id="name" name="name" required x-moz-errormessage="Please Enter your  Name" placeholder="Enter your name here"/>
        					</p>
        					<p>
        						Email Address:
        						<br />
        						<input type="text" placeholder="Enter your email here" height="20px"name="email" id="email" onblur="verifyEmail();" required x-moz-errormessage="Please Enter your Email"/>
        					</p>
        					<p>
        						Message:
        						<br />
        						<textarea type="text"name="message" id="message" rows="4" cols="25" ">  </textarea>
        					</p>
	<p>
        						<input class="button_example" type="submit" value="Send" name="Submit" />
        						<input class="button_example" id="reset" type="reset" value="Clear"/>
	</p>

        			  </form>
      <?php
$conn = mysql_connect('localhost', 'root', '');
	 if (!$conn)
    {
	 die('Could not connect: ' . mysql_error());
	}
	else
	mysql_select_db("Auclinic_database", $conn);
  if(isset($_POST['Submit']))
  {
  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];
  $date = date('Y-m-d H:i:s');
$chk=mysql_query("INSERT INTO comment(name,email,message,date) values ('$name','$email','$message','$date')");

if($chk)
{
  echo "<font face='arial' align='center' color='black' size='4'><img src='img/tick.png' width='25px' height='25px'>&nbsp;&nbsp;Sent !!!</font>";

echo'<meta content="5;feedback.php" http-equiv="refresh" />';
	}
	else
	{
	echo"<font color='red' size='4'><img src='img/error.png' width='20px' height='20px'>&nbsp;<p align='center'>The opration failed Please 'Try again'</p></font>";
	}
	}
mysql_close($conn);
?>

        				<script type="text/javascript" SRC="js/jsform/init_form.js"></script><!-- initialization of the AJAX Javascript -->
        			</div><!-- end grid -->
		 </div >
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
