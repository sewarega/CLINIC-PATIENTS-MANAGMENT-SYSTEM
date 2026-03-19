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

		

<!--<link href="adminstyle.css" rel="stylesheet" type="text/css" media="screen" />-->
		
<script type="text/javascript" src="jquery.js"></script>



<script type="text/javascript">
function printF(printData)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=760,height=800");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
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
	<table bgcolor="#E0FFFF"width="150" height="680" ><tr><td bgcolor="#808080">
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
                      <li><a href="export/exledeliver.php">Export deliver drug info</a></li>
					</ul>
				</li>
					<li><a href="#">Account setting</a>
					<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="changepass1.php">Change password</a></li>
						<li><a href="login.php">logout</a></li>

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
					<li> you are  on pharmacy report page</li>
					 <li><a href="pharmacyreport.php">Back</a></li><br />
    </h6>	<br />
          <li><a href="pharmacyreport.php">Generate Report</a></li>
						<li><a href="checkprescreptionrequest.php">Check request</a></li>
						<li><a href="searchpres.php">Deliver drug</a></li>
                      <li><a href="export/exledeliver.php">Export deliver drug info</a></li>
		  </div>
		
			<div  class="flt rp_block" style="margin-left:20px;">		  


                   
	<p align="right"><font color="#006699" size="4" face="cambrian;">If you want to Print this page Click here</font>
	<a href="#"  onClick="printF('printData')" title="Print this page">&nbsp;&nbsp;&nbsp;<img src="img/print_icon.JPG" width="40px" height="40"></a></p> <br/><br/>
<div id="printData">
<div style="width:730px;height:80px; ">
<div style="float:left;width:300px;font-family:cambrian;"><font size="5"><b>Genenal Report</b></font></div>
<div style="float: right;width:200px;text-align:justify;">
<b>AU IoT CLINIC OFFICE<br/>
<font color="#90a7ad">Done by Parmacist<br/>
Created:<?php echo Date('Y-m-d')?>

<br/><br/></font></b></div>
<br/><br/><br/>
<hr>
</div>

<center><b>Clinic Pharmacy Reports</b></center> 
<p>---------------------------------------------------------------------------------------------------------------------------------------</p>
  <div align="center">From:&nbsp;<strong><?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:&nbsp;<strong><?php echo $_POST['dayto']; ?></strong></div> <br/>
<table width="535" border="1" align="center" cellpadding="0" cellspacing="0" id="mytable">
          <thead>
            <tr bgcolor="#cccccc" style="margin-bottom:10px;">
              		<th width="164"><div align="center">Prisc.ID</div></th>
					<th width="136"><div align="center">Patient_Name</div></th>
					<th width="136"><div align="center">Patient_ID</div></th>
					<th width="114"><div align="center">Drug_Name</div></th>					
					<th width="108"><div align="center">Drug_type</div></th>
					<th width="164"><div align="center">Quantity</div></th>
					<th width="136"><div align="center">dosage</div></th>		
					<th width="108"><div align="center">Date_of_deliver</div></th>
					
            </tr>
          </thead>
          <tbody>
         <?php
			   $conn=mysql_connect("localhost","root","");//create connection
                mysql_select_db("Auclinic_database",$conn);//to select from the db 
						if(isset($_POST['Submit']))
						{		
								$a=$_POST['dayfrom'];
								$b=$_POST['dayto'];				
								$result3 = mysql_query("SELECT * FROM drugdelivertable where date BETWEEN '$a' AND '$b'");
                                    if(mysql_num_rows($result3)>0)
                               {
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								 $dasd=$row3['date'];
								 $result4 = mysql_query("SELECT * FROM drugdelivertable where date='$dasd'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
									//echo '<td><div align="center">'.$row4['report_id'].' '.$row4['report_date'].'</div></td>';
									}
									
									echo '<td><div align="center">'.$row3['presc_no'].'</div></td>';
									echo '<td><div align="center">'.$row3['pname'].'</div></td>';
									echo '<td><div align="center">'.$row3['patient_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['dname'].'</div></td>';						
									echo '<td><div align="center">'.$row3['drug_type'].'</div></td>';
									echo '<td><div align="center">'.$row3['quantity'].'</div></td>';
									echo '<td><div align="center">'.$row3['dosage'].'</div></td>';												
									echo '<td><div align="center">'.$row3['date'].'</div></td>';
								 echo '</tr>';
							}
						  }
                             else{
                        echo "<h3>Results</h3>";
echo"<font size='4px' align='left' color='red' >&nbsp;&nbsp;<p class='wrong'>Sorry,There no results between this Date. please enter correct date.!!!</p></font>";
echo' <meta content="7;pharmacyreport.php" http-equiv="refresh" />';
		                        }	 
		                     
						}
			  ?>
          </tbody>
</table><br/><br/><br/>
</div>
		 
			 <div class="cleaner"></div>
			
            </div>
            <div class="cleaner"></div>
        </div>
		 </div>
        <div class="cleaner"></div>
	<!--	<pre></pre>-->
					
	</div> 
						<?php
                  include("footer/footer.php");
               ?>
</div> 
</body>
</html>