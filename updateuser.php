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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

   <!--javascript-->
<script type="text/javascript" src="jquery.js"></script>
</head>
    
<body>
<div id="cal">
<?php
ob_start();
?>
<table >

	<tr>
	<table  bgcolor="#E0FFFF"width="150" height="430"  ><tr><td bgcolor="#808080">
	<table  bgcolor="#E0FFFF"width="150" height="430"  ><tr><td bgcolor="#808080">
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
			<li><a href="login.php">Logout</a></li>
			 </ul>
			</li>
			</ul>  
		</div> 
    <div id="main1">
		<div id="content">
		 <div class="flt1 cpinner">
		  
	<div  class="flt rp_block" style="margin-left:30px;">	
	<center><span style="font-family: cambria, Helvetica, sans-serif;color:#006699;font-size:23px;">Update User account Profiles </span><br />
	
</br></br>		
<?php
	include("config.php");	
?>
<form action="updateuser.php" method="POST">
<table  class="table"  style='width:350px;height:50px;border-radius:px;border-radius:px;border:px solid #336699' align='center'"> <!--class="table table-bordered"-->
              <thead>
                <tr>
                  <th>User_ID</th>
                  <th>FName</th>
				  <th>LName</th>
				  <th>Gender</th>
				  <th>Age</th>
			      <th>Mariage</th>
				  <th>Address</th>
				  <th>Phone</th>
				  <th>Salary</th>
                  
				 <th colspan="2">Option</th>
				 </tr>
              </thead>
              <tbody>
			  <?php 
			  $conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db  
							
if(isset($_POST['search'])):
 
					$id=$_POST['user_id'];
					$sql= "SELECT * FROM user where user_id='$id'";
					$result=mysql_query($sql);
			
				while($data = mysql_fetch_object($result) ):
			  ?>
                <tr>
                  <td><?php echo $data->user_id?></td>
                  <td><?php echo $data->fname?></td>
				  <td><?php echo $data->lname?></td>
				  <td><?php echo $data->sex?></td>
				  <td><?php echo $data->age?></td>
				  <td><?php echo $data->mariage_status?></td>
				  <td><?php echo $data->address?></td>
				  <td><?php echo $data->phone_no?></td>
				  <td><?php echo $data->salary?></td>
				   <td>
					<a href="updateuserBYID.php?user_id=<?php echo $data->user_id ?>">
						<button class="btn btn-info" type="button"  name="Submit" onclick="return confirm('You Are Going to Update Record!!')"> Edit</button>
					</a>
				  </td>
				   <td>
					<a href="deletuserBYID.php?user_id=<?php echo $data->user_id?>">
						<button class="btn btn-danger" type="button"  name="Submit" onclick="return confirm('You Are Going to Delete Record!!')">Remove </button>
					</a>
				  </td>
                
                </tr>
			  <?php
				endwhile;
			  ?>
			   <?php
				endif;
			  ?>
              </tbody>
		</table></form>
		
		<?php
$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db  
							
if(isset($_POST['submit']))
	
 {
	 $pid = $_GET['patient_id']; /** get the patient ID ***/

$sql="DELETE FROM patient_table where patient_id = '$pid'"; /** execute the sql delete code **/
$a=mysql_query($sql) or die(mysql_error());
 if($a)
 {
	 echo"<font size='3px'  color='green'>successfuly deleted!!</font>";
//include("updateuser.php"); /** redirect to deletepatient.php **/
echo'<meta content="7;updateuser.php" http-equiv="refresh" />';
 }
 else{
 include("deletepatient.php");
 echo"<font size='3px'  color='red'>failed deletion!!</font>";

 
 }
 }
?>
</center></br></br></br>
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