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
<!--javascript-->
<script type="text/javascript" src="jquery.js"></script>



</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table width="150">

	<tr>
	<table bgcolor="#E0FFFF"width="150" height="880" ><tr><td bgcolor="#808080">
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
		 <div class="flt1 lp_boxbg"> 
		  <li>logged as <?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
		  <li><a href="pharmacist.php">Back</a></li><br />
		
		 <span class="flt1 lp_txtour">our solutions</span><br />
          <span class="flt1 lp_boxtxt">You may conduct your parmacy operations in one of our branches. has employed the top security for various 
		  transactions.  </span><br />
          <img src="images/lp_ashsqr.jpg" width="3" height="3" alt="" class="flt1 lp_boxbult" /> 
		  <a href="" class="flt lp_boxtxt2">Generate</a>
		   <img src="img/d1.JPG" class="img-circ"width="200px" height="150px"><br><hr>
		  </div>
			<div  class="flt rp_block" style="margin-left:20px;">		  
<div style="width:250px;height:25px;border:px #ebf5ac solid;border-top-left-radius:px;
border-top-right-radius:px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;margin-top:1px;margin-left:160px;">
<font style="cambria"size="4"><b>Drug Details</b></font> </br>
</div></br>

		<!--<h4><a href="trans.php">back</a></h4> <h3> </h3>-->   
 <?php
$conn=mysql_connect("localhost","root","");
$db1=mysql_select_db("mtuclinic_db",$conn);
$res = mysql_query("SELECT * FROM drugtable");
if(mysql_num_rows($res)>0)
{
echo "<table class='table'  style='width:270px;height:0px;border-radius:10px;border-radius:10px;border:1px solid #336699' align='center'>
<tr bgcolor=''>
<th  border='1' height='20' bgcolor=''><font color='black'>Drug_Code</th>
<th bgcolor=''><font color='black'>Drug_name</th>
<th bgcolor=''><font color='black'>Manufacture</th>
<th bgcolor=''><font color='black'>Drug_type</th>
<th bgcolor=''><font color='black'>Dosage</th>
<th bgcolor=''><font color='black'>Quantity</th>
<th bgcolor=''><font color='black'>expire_date</th>
<th height='40' ><font color='black'>Edit</font></th>
</tr>";
while($row = mysql_fetch_array($res))//
  {
  echo "<tr>";
echo "<td>" . $row['dcode'] . "</td>";
echo "<td>" . $row['dname'] . "</td>";
echo "<td>" . $row['cname'] . "</td>";
echo "<td>" . $row['drug_type'] . "</td>";
echo "<td>" . $row['dosage'] . "</td>";
echo "<td>" . $row['quantity'] . "</td>"; 
echo"<td>" . $row['expire_date'] . "</td>";
echo"<td >&nbsp;&nbsp;<a href='updatedrugBYCode.php? dcode=".$row['dcode']."'><img src='img/46.PNG' width='30px' height='25px' title='Edit Button'></font></a></td>";
echo "</tr>";
  }
echo "</table>";
}
else{
   echo "<center>";
  echo "<font face='monotype corsiva' size='5'color='red'>expired drug not found !!</font>'; 
  
   echo </center>";
   }
mysql_close($conn);
?>
			
		 
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