
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css1/style12.css">
<link rel="stylesheet" href="css1/responsive.css">
<script src="js/modernizr.js"></script>
<link href="css1/menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css1/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table>

	<tr>
	<table  bgcolor="#E0FFFF "width="150" height="1185" ><tr><td bgcolor="#808080">
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
<table>
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
<div id="cah">
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
		 
    <div class="page-content">
      <div class="entry-content cf">
    <nav class="cf" style="height:auto;width:850px;margin-left:50px;"><center>
	<span style="font-family: cambrian;color:black;font-size:23px;">About AU IOT Clinic Information Managment System</span><br /><br>
 </center>
    <div class="toggle-trigger"><i></i><span style="font-family:cambrian;color:#006699;font-size:20px;">Objective of the project</span><br /></div>
			<div class="toggle-container">
			<p >Clinic patient Information Management Systems are computer software products that coordinate and integrate all the inherent activities involved in the management and running of a healthcare facility. They must meet specified security, technology and functionality standards for managing electronic medical records and practice management information. Clinic Information management system, is created to computerize manual operations in clinics. The primary purpose is to digitize patient records so as to make data retrieval easy and efficient. Being in the digital form, patient data can be conveniently shared and accessed by multiple simultaneous users at different locations, resulting in clinical operations and collaboration among clinicians. </p>
			</div><br>
	<div class="block-divider"></div>
		
    <div class="toggle-trigger"><i></i><span style="font-family: cambrian;color:#006699;font-size:20px;">Mission</span><br /></div>
		<div class="toggle-container">
		  <p>Ambo University Institute of technology has a mission of supporting the development endeavors of the people by tackling the instant problems by utilizing natural resources and cultural values through inculcating scientific knowledge and skills relevant to the country and assuring quality education.</p>		
			</div><br>
	<div class="block-divider"></div>
		
    <div class="toggle-trigger"><i></i><span style="font-family: cambrian;color:#006699;font-size:20px;">Vision</span><br /></div>
			<div class="toggle-container">
			<p>Ambo University Institute of technology aspires to be the leading higher education of institution being center of excellent in education and research in areas of natural resources and cultural value utilization for development.producing competent and innovative professionals.
through providing quality instructional, co curricular and cultural involvement

Carrying out problem solving research through the active involvement of stakeholders and,

Providing demand driven community and consultancy services</p>
			 </div><br>
    <div class="block-divider"></div>
        
  </nav><br><br><br><br><br><br><br><br><br>
           </div>
    </div>
  
  </div><br>
             <div class="cleaner"></div>
	<!--	<pre>	   </pre>-->
	</div>
			<?php
      include("footer/footer.php");
  ?>
</div>
			<script src="js/jquery.js"></script>
			<script src="js/custom.js"></script>
			<script src="js/superfish-1.4.8/js/hoverIntent.js"></script>
			<script src="js/superfish-1.4.8/js/superfish.js"></script>
			<script src="js/superfish-1.4.8/js/supersubs.js"></script>
			<script src="js/nivoslider.js"></script>
			<script src="js/tabs.js"></script>
</body>
</html>