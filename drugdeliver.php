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
<script type="text/javascript" src="jquery.js"></script>

<script>
function onlyNum(evt) {
  // Usage: onKeyPress="return onlyNum(event)"
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;

  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    var status = 'This field accepts numbers only!';
    alert(status);
    return false;
  }
  var status = '';
  return true;
}
</script>
</head>
<body>
<div id="cal">
<?php
ob_start();
?>
<table width="150" >

	<tr>
	<table border="" bgcolor="#E0FFFF"width="150" height="680" ><tr><td bgcolor="#808080">
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
						<link href="atractive_style.css" rel="stylesheet" type="text/css" />

					</ul>
				</li>
			<li><a href="logout.php">Logout</a></li>
			</ul>
		</div> 
    <div id="main1">
		<div id="content">
		
		  <div class="flt1 cpinner">
		  
		<div class="flt1 lp_boxbg"> <h6 align="left">
		            <li>logged as&nbsp;<?php print($FirstName); ?> <?php print($LName); ?>  || <a href="logout.php">Logout</a></li>
					<li> you are  on drug deliver page</li>
					 <li><a href="searchpres.php">Back</a></li><br />
    </h6>
		<span class="flt1 lp_txtour">our solutions</span><br />
         <span class="flt1 lp_boxtxt">You may conduct your pharmacy operations in one of our clinic. has employed the top security for various 
		  transactions.  </span><br />
          <img src="images/lp_ashsqr.jpg" width="3" height="3" alt="" class="flt1 lp_boxbult" /> 
		  
		  </div>
		
			<div  class="flt rp_block" style="margin-left:20px;">	
						

			 <div  style="width:600px;align:center; margin:0 auto; position:relative; border:px #ebf5ac solid; ">
			 
		<?php
$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db  
							
if(isset($_POST['search']))
 {
					$pid=$_POST['dayfrom'];
					$dcode=$_POST['dcode'];
					$sql= "SELECT * FROM patient_table where patient_id='$pid'";
					$sql1="SELECT * FROM drugtable where dcode='$dcode'"; 
					$drug=mysql_query($sql1);
					$drug1=mysql_num_rows($drug);
					$cha1=mysql_query($sql);
					$count=mysql_num_rows($cha1);
					if($count < 1)
					{
					echo"<center>";
					echo"<br><br>";
					echo('<font color="red" size="4px">Please Enter correct ID</font>');
					echo'<meta content="5;searchpres.php" http-equiv="refresh" />';
					}
					else if($drug1 < 1){
						echo"<center>";
					echo"<br><br>";
					echo('<font color="red" size="4px">Please Enter correct Drug Code Number</font>');
					echo'<meta content="5;searchpres.php" http-equiv="refresh" />';
					}
					else
					{
					$result = mysql_query("SELECT * FROM patient_table WHERE patient_id='$pid'");
			         $data = mysql_fetch_object( $result ); 
					 $sql="SELECT * FROM drugtable where dcode='$dcode'"; 
                        $result1=mysql_query($sql);
                      $dataa = mysql_fetch_object($result1); 
                             }
                             }			
                          ?>	 
			 <center>
				 <?php

	$conn=mysql_connect("localhost","root","");//create connection
mysql_select_db("Auclinic_database",$conn);//to select from the db 
 
if(isset($_POST['Submit']))
{
$dcode=$_POST['dcode'];
$pname=$_POST['pname'];
$pid=$_POST['patient_id'];
$dname=$_POST['dname'];
$drug_type=$_POST['drug_type'];
$quantity=$_POST['quantity'];
$dosage=$_POST['dosage'];
$pdname=$_POST['pdname'];
$sign=$_POST['sign'];
$date=$_POST['date'];
if($quantity == ""){
echo "<p style='color:red;margin-left:10px;'> plase Enter Drug Quantity!</p>";
}
elseif(!is_numeric($quantity)){
	echo "<p style='color:red;margin-left:10px;'>Please Enter Drug Quantity Number Only!</p>";
	}
		elseif($sign == ""){
			echo "<p style='color:red;margin-left:10px;'>Please Sign!</p>";
		}
		elseif($date == ""){
			echo "<p style='color:red;margin-left:10px;'>Enter your Date!</p>";
		}
		else{

$sql="SELECT * FROM drugtable where dcode='$dcode' AND dname='$dname' AND drug_type='$drug_type';"; 
   $result=mysql_query($sql,$conn);
if(mysql_num_rows($result)>0)
{
while($row=mysql_fetch_array($result))
{
$quanti=($row['quantity'])-($quantity);
		
mysql_query("UPDATE drugtable SET quantity='$quanti' where dcode='$dcode' AND dname='$dname' AND drug_type='$drug_type'");

}
}
$res=mysql_query("INSERT INTO drugdelivertable(pname,patient_id,dname,drug_type,quantity,dosage,pdname,sign,date) values('$pname','$pid','$dname','$drug_type','$quantity','$dosage','$pdname','$sign','$date')");
if($res )
	{
		echo "<br>";
		echo"<font size='4px' color='green'><img src='img/tick.png' width='25px' height='25px' align='left'>
		<p class='left'>Prescription about patient drugs succefully registered !!!</p></font>";
echo'<meta content="6;searchpres.php" http-equiv="refresh" />';
	}
	else
	{
	echo"<font color='red' size='4'><img src='img/error.png' width='20px' height='20px'>&nbsp;<p align='center'>The opration failed Please 'Try again'</p></font>";
	echo'<meta content=";searchpres.php" http-equiv="refresh" />';
	}
	
}
}
mysql_close($conn);
?>
 </center>
			 
 <form action="drugdeliver.php" method="post" name="abc" onSubmit="return validateForm()">
<h3>Drug Prescription Form </h3>

			  <table valign="top" width="500px" align="center">
  <tr>
    <td colspan="2"><div style="font-family:cambria;color:black; font-size:20px;">All Field must be filled up</div></br></td>
  </tr> 
<tr>
  <td width="120" valign="top"><div align="right"><b>Drug Quantity:</b></div></td>
        <td width="236"><input type="text" name="quantity" id="quantity" onKeyPress="return onlyNum(event)" required="required" ></br></td>
      </tr>
			  <tr>
                <td valign="top" ><div align="right"></div></td>
			<td colspan="2"><input type='hidden' name="pdname" id="pdname" value="<?php echo $row['fname'] . " " . $row['lname'] ?>"  required="required">
                     <input type="hidden" name="sign" id="textfield2" value="checked" /> </br>
					  </select></td></br></br>
                 
              </tr> 
                <tr>
                <td valign="top"><div align="right"><b>Date:</b></div></td>
                <td><input type="text" class="tcal" name="date" id="ddate"   /></br></td></br></br></br></br>
                  
              </tr>	
      <tr >
   <td width="236"><input type='hidden' name="dcode" id="dcode"  value="<?php echo $dataa->dcode ?>" required="required" ></br></td>
     
        <td ><input type='hidden' name="presc_no" id="presc_no"   value=""  disabled="disabled"></td>
         <td width="236"><input type='hidden' name="pname" id="pname"  value="<?php echo $data->fname ?>&nbsp;&nbsp;<?php echo $data->lname ?>"></td>
         <td width="236"><input type='hidden' name="patient_id" id="patient_id" value="<?php echo $data->patient_id ?>"></td>
          <td width="236"><input type='hidden' name="dname" id="dname"  value="<?php echo $dataa->dname ?>"></br></td>
        	   <td width="236"><input type='hidden'name="drug_type" id="drug_type"  value="<?php echo $dataa->drug_type ?>"  ></br></td>
      <td width="236"><input type='hidden' name="dosage" id="dosage"  value="<?php echo $dataa->dosage ?>"  ></br></td>
    
      </tr>			  
                <tr>
                
                <td colspan="2" align="right"><input type="submit" name="Submit" value="Submit" class="button_example"/>&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" value="Reset"  class="button_example"/></td>
                 </tr>
                 </table>
 
		           
                 </form>
				</div>
				
  				
</br></br>


			
		 
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