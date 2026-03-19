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

<style>
#contact_form form .input_field{ 
	width: 270px; 
	margin-left: 50px;
}
#contact_form form label { 
	display: block; 
	width: 250px; 
	margin-left: 5px;
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
	<table bgcolor="#E0FFFF"width="150" height="650" ><tr><td bgcolor="#808080">
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
				<li><a href="#">Operation</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="serchprescription.php">Priscription </a></li>
						<li><a href="filterlrequest.php">Lab request</a></li>
						<li><a href="checklabresult.php">Check lab result</a></li>
						<li><a href="diagnosisform.php">Patient history</a></li>
					<li><a href="#">Give refer stack out </a>
						<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="stackoutDesise.php">Labratory Refer</a></li>
						<li><a href="stackdrug.php">Drug Refer</a></li>
					</ul></li>	</ul>
				</li>
				<li><a href="#">Account Setting</a>
					<ul style="margin-left:10px;padding-right:4px;">
						<li><a href="changepass1.php">Change password</a></li>
						<li><a href="logout.php">Logout</a></li>

					</ul>
				</li>
			</ul>   		
		</div> 
		
    <div id="main1">
		<div id="content">
		 <li><a href="doctorpage.php">back</a></li>
		  <div class="flt1 cpinner">
		  
		<div class="flt1 lp_boxbg"> <span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
		 
</div>
		
			<div  class="flt rp_block" style="margin-left:20px;">	
			

			 <div  style="width:600px;align:center; margin:0 auto; position:relative; border:1px #ebf5ac solid; ">
 <form action="diagnosisform.php" method="post" name="abc" onSubmit="return validateForm()">
<h2>Diagnosis Form </h2>
			  <table width="500px" align="center">
  <tr>
    <td colspan="2"><div style="font-family:monotype corsiva, Helvetica, sans-serif;color:black; font-size:25px;">All Field must be filled up</div></br></br></td>
  </tr></br>
   <tr width="">
  <td width="120" valign="top"><div align="right">Patient Name:</div></td>
        <td > <input type="text" name="pname" id="pname" required="required" >
              
      </tr>
  <tr>
  <td width="120" valign="top"><div align="right">Patient ID:</div></td>
        <td width="236"><input type="text" name="patient_id" id="patient_id" required="required" >
              
        </td>
      </tr>
	 
             
			  <tr >
                <td width="150" valign="top"><div align="right">Patient Semptoms:</div></td>
                <td> <label for="textarea"></label>
                          <textarea name="rx" id="textarea" cols="" rows="" required="required" ></textarea></td>
              </tr>
			   <tr>
                <td valign="top"><div align="right">Diagnosis Date:</div></td>
                <td><input type="text" name="ddate" id="ddate" class="tcal"  required="required"></br></td></br></br>
                  
              </tr>
			  <tr>
                <td valign="top" ><div align="right">Prescriber Name:</div></td>
                <td colspan="2"><input type="text" name="pdname" id="pdname" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      Sign:<input type="checkbox" name="sign" id="textfield2" value="checked"> </br></br></td>
                 
              </tr>                    
                <tr>
                
                <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit" class="utton_example"/>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" value="Reset"  class="utton_example"/></td>
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
$pname=$_POST['pname'];

$pid=$_POST['patient_id'];
$rx=$_POST['rx'];
$ddate=$_POST['ddate'];

$pdname=$_POST['pdname'];
$sign=$_POST['sign'];
$res=mysql_query("INSERT INTO diagnosistable(pname,patient_id,rx,ddate,pdname,sign) values('$pname','$pid','$rx','$ddate','$pdname','$sign')");
if($res )
	{
echo "<font color='green' size='4'><p align='center'class='center'> Diagnosis succefully registered in to patient history!!!</p></font>";
echo'<meta content="5;diagnosisform.php" http-equiv="refresh" />';
	}
	else
	{
	echo"<font color='green' size='4'><p class='right'align='center'>The opration failed Please try again</p></font>";
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