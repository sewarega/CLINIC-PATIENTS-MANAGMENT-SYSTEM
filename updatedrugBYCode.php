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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		

<!--<link href="adminstyle.css" rel="stylesheet" type="text/css" media="screen" />-->
		
<script type="text/javascript" src="jquery.js"></script>


</style>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table bgcolor="#E0FFFF"width="200" height="650" ><tr><td bgcolor="#808080">
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
				<li><a href="regihp">Generate Report</a></li>
				
				<li><a href="logout.php">login Out</a></li>
			</ul>       	
		</div> 
    
    <div id="main1">
		<div id="content">
		
		  <div class="flt1 cpinner">
		  
		<div class="flt1 lp_boxbg"> <span class="flt1 lp_txtour">our solutions</span><br />
		<h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
    </h6>
	<li><a href="updatedrug.php">back to previous page</a></li>
          <span class="flt1 lp_boxtxt">You may conduct your parmacy operations in one of our branches. has employed the top security for various 
		  transactions.  </span><br />

		  </div>
		
			<div  class="flt rp_block" style="margin-left:20px;">		  

 
<div style="width:350px; margin:0 auto; position:relative; border:2px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:25px; margin-top:20px; color:#000000;">
<?php
mysql_connect('localhost','root',''); 	
	mysql_select_db('Auclinic_database');
$id = $_REQUEST['dcode'];

  if(isset($_POST['update'])):
  	        
				$dname=$_POST['dname'];
				$cname=$_POST['cname'];
				$drug_type=$_POST['drug_type'];
				$dosage=$_POST['dosage'];
				$quantity=$_POST['quantity'];
				
				$expire_date=$_POST['expire_date'];
				
  mysql_query("UPDATE drugtable SET dname='$dname',cname='$cname', drug_type='$drug_type', dosage='$dosage',quantity='$quantity',expire_date='$expire_date' WHERE dcode='$id'") 
or die(mysql_error());
   echo "<font color='black' size='4'><p class=''>Drug succefully updated!!!</p></font>";
 echo "<script>window.location='viewdrug.php';</script>";
			endif;
			$result = mysql_query("SELECT * FROM drugtable WHERE dcode='$id'");
			$data = mysql_fetch_object( $result ); 
  ?>
<form  method="POST" action="updatedrugBYCode.php"  onsubmit='return formValidation()'>
 <div style="background-color:;border-radius:5px;font-family:Arial, Helvetica, sans-serif; color:#000000; padding:5px; height:22px;"> 
 <div style="float:left;" ><strong><font color="black" size="4">Edit Drug Records</font></strong></div>
<div style="float:right; margin-right:20px; background-color:#cccccc; width:25px;  text-align:center; border-radius:10px; height:12px;"><a href="updatedrug.php" title="Close"><font size="4">X</font></a></div> 
 </div>
 <table valign='top' align="center">
 <tr>
<input type='hidden' name='dcode' value="<?php echo $data->dcode?>">
<tr><td>Drug Name:</td><td width="130px"><input type='text' name='dname' id='dname' value="<?php echo $data->dname ?>"></td></tr>
<tr><td>Company Name:</td><td><input type='text' name='cname' id='cname' value="<?php echo $data->cname ?>"></td></tr>
<tr><td>Drug Type:</td><td ><input  type='text' id='drug_type' name='drug_type'  value="<?php echo $data->drug_type ?>"></td></tr>
<tr><td>Dosage:</td><td ><input  type='text' name='dosage'  id='dosage' value="<?php echo $data->dosage?>"></td></tr>
<tr><td>Quantity  :</td><td><input type='text' name='quantity' id='quantity'  value="<?php echo $data->quantity?>"></tr></td>
<tr><td>expire_date:</td><td><input type='text' class="tcal" name='expire_date' id='expire_date' value="<?php echo $data->expire_date?>"></tr></td></br></br>
<tr ><td colspan=2 align='right'><input type='submit' name='update' value='Save Changes' class="button_example"></tr></td></tr></tr>
</tr>
</table></tr></tr>
 </form></br></br></br>
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