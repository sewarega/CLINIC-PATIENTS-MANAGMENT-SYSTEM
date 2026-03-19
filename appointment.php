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

<script type="text/javascript" src="jquery.js"></script>
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
	<table bgcolor="#E0FFFF"width="148" height="580" ><tr><td bgcolor="#808080">
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
				<li><a href="#">Manage Patient</a>
					<ul style="margin-left:10px;padding-right:4px;">
					<li><a href="searchpa.php">Search Patient</a></li>
						<li><a href="patientreg.php">Register patient</a></li>
						<li><a href="searchupdate.php">Update patient</a></li>
						<li><a href="viewpatien.php">View patient</a></li>
					</ul>
				</li>
				<li><a href="dehp">Operation </a>
				<ul style="margin-left:10px;padding-right:4px;">
				<li><a href="card.php">Give Card to Patient </a></li>
				<li><a href="serchpatient.php">Register appointment </a></li>
					<li><a href="searchappo.php">Check appointment date</a></li>
					<li><a href="generalreport.php">Generat Report</a></li>
					<li><a href="export/exlepatient.php">Export patient info</a></li>	
					</ul>
				</li>
				<li><a href="dehp">Account Setting </a>
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
		  
		<div class="flt1 lp_boxbg"> 
		<h6 align="left">

		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on appointment page</li>
					<li><a href="serchpatient.php">Back</a></li><br />
    </h6>
		<span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />

		  </div>
		
			<div  class="flt rp_block" style="margin-left:20px;">	
						
<span style="font-family:cambrian;color:#006699;font-size:25px;"><font > Patient Appointment Date Form</font></span> </br> </br>

			   <div style="width:390px; margin-left:40px;; position:relative; border:px #ebf5ac solid; ">
			   
			   <?php
include('config.php');
$emp=mysql_query("select * from account where user_type='Doctor'")or die(mysql_error());
?>
     <?php
$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db  
							
if(isset($_POST['search']))
 {
					$pid= $_POST['dayfrom'];
					$sql= "SELECT * FROM patient_table where patient_id='$pid'";
					$cha1=mysql_query($sql);
					$count=mysql_num_rows($cha1);
					if($count < 1)
					{
					echo"<center>";
					echo"<br><br>";
					echo('<font color="red" size="4px">Please enter correct ID</font>');
					echo'<meta content="5;serchpatient.php" http-equiv="refresh" />';
					}
					else
					{
					$result = mysql_query("SELECT * FROM patient_table WHERE patient_id='$pid'");
			         $data = mysql_fetch_object( $result ); 
                             }
                             }			
                          ?>
							<form action="serchpatient.php" method="post" onSubmit="return create();" name="create1">					  
						  <input type='hidden' name="fname"  value="<?php echo $data->fname ?>" required>  
						  <input type='hidden' name="lname"  value="<?php echo $data->lname ?>" required/>
						  <input  type='hidden' name="patient_id"  value="<?php echo $data->patient_id ?>"required><br><br>			  
                         Appointment Start Date:&nbsp;&nbsp;
						  <input style="height: 25px;width:150px;" class="tcal" type="text" name="apsdate" size="20" required/><br><br>
						 Appointment End Date:&nbsp;&nbsp;;&nbsp;
						  <input style="height: 20px;width:150px;"class="tcal" type="text" name="apedate" size="20" required/><br><br>
						 Appointment Time:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <input style="height:25px;" width="15"type="text" name="aptime" size="20" required/><br><br>
                         Provider doctor name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<select name="dname" style="height: 25px;width:170px;"  required/><?php  while($row=mysql_fetch_array($emp))
{ ?>
<option><?php print$row['fname'].'&nbsp;&nbsp;'.$row['lname'];
?>
<?php
}?>
<br><br>
							 <p class="submit" align="right"><input type="submit" name="Submit" value="Submit" class="button_example"/>&nbsp;&nbsp;
		                     <input type="reset" name="reset" value="Reset"  class="button_example"/> </p>
          
        </form>
			</div>
 </br></br></br>
			 <div class="cleaner"></div>
            </div>
            <div class="cleaner"></div>
        </div>
		 </div>
        <div class="cleaner"></div>

	</div> 
			<div id="footer">
			<div id="link">
             <p style="text-align:right;padding-right:30px;"><a  href="home.php">Home</a>|<a href="about.php">About Us</a>|<a href="comment.php">View Comment</a>|<a href="about.php">About Us</a>
			  <a href="#top"><img src="img/arrow_up.png" width="30px" title="Scroll Back to Top"></a></p>
			 </div>
		<div id="tooplate_copyright">
					<div id="footp">
					<a href="http://google.com"><img src="images/gi.png" width="25px" height="25px" id="youtube"></a>
		            <a href="http://facebook.com"><img src="images/fbi.jpg" width="25px" height="25px" id="facebook"></a>
					<b>Copyright &copy; 2008 Reserved. Clinic patient Information Managment System</b>
					</div>
		</div>
	 </div>
</div> 
</body>
</html>