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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />		
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table width="150">

	<tr>
	<table bgcolor="#E0FFFF"width="150" height="690" ><tr><td bgcolor="#808080">
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
		  <li> you are on check lab request page</li>
		  <li><a href="labratoristpage.php">Back</a></li><br />
		<div class="flt1 lp_boxbg"> <span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
          <img src="img/l1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
		  </div>
		
			<div  class="flt rp_block" style="margin-left:10px;">	
			

    
     <div class="login" style="margin-left:30px;">				
       <form id="form1" name="login" method="POST" action="checklabreport.php" onsubmit="return validateForm()">
  	
<p style="font-size:20px;font-family:monotype corsiva, Helvetica, sans-serif;color:black;" >
If you wants to know check apatient that have an labratory request </br>information by using searching by request date.</p>
   <table width="399px" valign="top" align="left"><br>
   <tr>
<td class='para1_text' width="200px"><font color="" > <b>Request Date</b></font></td>
<td><SPAN><input type="text" class="tcal"  name="date"  placeholder="Start Date...."  size="px" required x-moz-errormessage="Please enter patient id No"></SPAN></td>	   
    <td><p align="center"><input type="submit" name="search" class="button_example" value="Search" /></p></td>
  </tr>
</table></br></br><br>
  </form>
  </div> 
 <?php
$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db  
							
if(isset($_POST['search']))
 {
					$apsdate=$_POST['date'];
					$sql="SELECT * FROM labrequesttable  WHERE  date= '$apsdate'";


				//	$sql= "SELECT * FROM appointment where apsdate='$apsdate'";
					$cha1=mysql_query($sql);
					$count=mysql_num_rows($cha1);
					
					if($count < 1)
					{
					echo"<center>";
					echo"<br><br>";
					echo "<font color='black' size='4px'><img src='img/error.png' width='20px' height='20px'>&nbsp;No Request are reported</font>";
					echo'<meta content="7;checklabreport.php" http-equiv="refresh" />';
					}
					else
					{
						
					echo"<center>";
					echo"<br>";
					
					echo"<br>";
echo  "<table class='table' style='width:300px;height:50px;border-radius:10px;border-radius:10px;border:px solid #336699' align='center'>
<tr >
<th colspan='8'><h4>Labratory Request information about patient</h4.</th>
</tr>
<tr height='30px' bgcolor='#336699'>
<th bgcolor='#336699'><font color='white'>Card_No.</th>
<th bgcolor='#336699'><font color='white'>Patient_ID</th>
<th bgcolor='#336699'><font color='white'>Age</th>
<th bgcolor='#336699'><font color='white'>Sex</th>
<th bgcolor='red'><font color='white'>Plan</th>
<th bgcolor='#336699'><font color='white'>Prescriber_D/Name</th>
<th bgcolor='#336699'><font color='white'>Date_of_request</th>
<th bgcolor='#336699'><font color='white'>Sign</th>
</tr>";
while($row = mysql_fetch_array($cha1))
  {
  print ("<tr>");
   print ("<td>" . $row['card_no']. "</td>");
  print ("<td>" . $row['patient_id']. "</td>");
  print ("<td>" . $row['age']. "</td>");
  print ("<td>" . $row['sex']. "</td>");
  print ("<td>" . $row['plan']. "</td>"); 
  print ("<td>" . $row['pdname']. "</td>"); 
  print ("<td>" . $row['date']. "</td>"); 
  print ("<td>" . $row['sign']. "</td>");     
  print ("</tr>");
  }
print( "</table>");
echo"</center>";
}
}
mysql_close($conn);
?>


 </br></br></br>


			
		 
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