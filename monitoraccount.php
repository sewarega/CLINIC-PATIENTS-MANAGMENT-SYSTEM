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

<link rel="stylesheet" href="css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="atractive_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<script type="text/javascript" src="jquery.js"></script>
<script>
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='monitoraccount.php');
   }
   else
   {
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
<table>

	<tr>
	<table bgcolor="#E0FFFF"width="60" height="940" ><tr><td bgcolor="#808080">
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
			<li><a href="logout.php">Logout</a></li>
			 </ul>
			</li>
			</ul>  
			       	
		</div> 
    <div id="main1">
		<div id="content">
		 <div class="flt1 cpinner">
		  <div class="flt1 lp_bbg" style="width:240px;background-color:white;"> 
		  <h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on control account page</li>
					<li><a href="Admin.php">Back</a></li><br />
    </h6>
		 
		  <span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt111">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />

		  </div>
		
	<div  class="flt rp_block" style="margin-left:0px;">	
	
		
		 <?php
$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db 		 
			$admin=mysql_query("select *from account where user_type='Admin'");
			$countadmin=mysql_num_rows($admin);
			
			$doctor=mysql_query("select *from account where user_type='Doctor'");
			$countdoc=mysql_num_rows($doctor);
			$lab=mysql_query("select *from account where user_type='Lab tecnitian'");
			$countlab=mysql_num_rows($lab);
			$clerk=mysql_query("select *from account where user_type='Clerk'");
			$countclerk=mysql_num_rows($clerk);
			$parm=mysql_query("select *from account where user_type='Pharmasist'");
			$countpmana=mysql_num_rows($parm);
			
			echo '<font size="4" align="center" font="cambria"><br><br><h3><u>Information About User:</u></h3><br>There are <b>'.$countadmin. '</b>&nbsp; Admin , <b> '.$countdoc. '</b>&nbsp;&nbsp;Doctor, &nbsp;<b>'.$countlab. '</b>&nbsp;Lab Tecnitians,&nbsp;&nbsp;<b>'.$countclerk. '</b>&nbsp;Clerk &nbsp;and &nbsp;&nbsp;<b>'.$countpmana.'</b>&nbsp;&nbsp;Pharmasist <br><br> Total number number of users is <b>' .($countadmin+ $countdoc+$countlab+ $countclerk+$countpmana).'.'.'</b></font>' ;
   ?>
   <hr>
<table align='' class="table" width="600px"style='border-radius:10px;border:1px solid silver;  box-shadow:0 0 0px rgba(0,0,0,0.4);'>
<tr bgcolor="silver">
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>User_Name</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>User_ID</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>Email</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>User_Type</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>User_Permision</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:;'><font color='white' size='2'>Delete</th>
</tr>  
<?php
$result = mysql_query("SELECT * FROM account where user_type !='Patient'");
while($row = mysql_fetch_array($result))
  {
$ctrl = $row['user_id'];
$fname=$row['fname'];
$mNAME=$row['lname'];

$email=$row['email'];
$username=$row['user_type'];
$status=$row['status'];
?>
<tr>
<td><?php echo $fname."&nbsp;".$mNAME;?></td>
<td><?php echo $row['user_id'];?></td>


<td><?php echo $email;?></td>
<td><?php echo $username;?></td>
	
<td><?php
						if(($status)=='0')
						{
						?>
                       			 <a href="status.php?status=<?php echo $row['user_id'];?>" onclick="return confirm('Really you activate (<?php echo $fname?>)');">
                        		<img src="IMG/deactivate.png" id="view" width="16" height="16" alt="" />Deactivated </a>
                        <?php
						}
						if(($status)=='1')
						{
						?>
                       			 <a href="status.php?status=<?php echo $row['user_id'];?>" onclick="return confirm('Really you De-activate (<?php echo $fname?>)');"> 
                       			 <img src="IMG/activate.png" width="16" id="view" height="16" alt=""  />Activated</a>
                        <?php
						}
                        ?>
						</td>
						<?php
						print("<td style='height:30px;' align = 'center' width = '1'><a href = 'deleteuser.php?patient_id=".$ctrl."'><img width='20px' height='15px' src = 'img/actions-delete.png' title='Delete' onclick='isdelete();'></img></a></td>");
						?>

		</tr>
<?php
  }
print( "</table>");
mysql_close($conn);
?>
  </form>
  
  </br></br>
  
  
  

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