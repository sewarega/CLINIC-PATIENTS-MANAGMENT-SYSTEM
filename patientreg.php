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
 <!--<?php

$uname=$_SESSION['user_name'];
$result=mysql_query("SELECT * FROM  account WHERE 	user_name='$uname'")or die(mysql_error);
$row=mysql_fetch_array($result);
$FirstName=$row['fname'];
$LName=$row['lname'];
$user_name=$row['user_name'];
?>-->
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
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" SRC="js/jquery.pngFix.pack.js"></script>
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
    <script>
function validate(myform,email) {
 
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[myform].elements[email].value;
   if(reg.test(address) == false) {
 
      alert('Invalid Email Address');
      return false;
   }
}
</script>

<?php
	include("validation/patientreg.php");

 ?>
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
	<table bgcolor="#E0FFFF"width="140" height="820" ><tr><td bgcolor="#808080">
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
					<li> you are  on register patient page</li>
					<li><a href="clerkpage.php">Back</a></li><br />
    </h6>
         <li><a href="card.php">Give Card to Patient </a></li>
				<li><a href="serchpatient.php">Register appointment </a></li>
					<li><a href="searchappo.php">Check appointment date</a></li>
					<li><a href="generalreport.php">Generat Report</a></li>
					<li><a href="export/exlepatient.php">Export patient info</a></li>
		  </div>
			<div  class="flt rp_block" style="margin-left:20px;">
<span style="font-family: monotype corsiva, Helvetica, sans-serif;color:#006699;font-size:30px;"><font color="#006699"><b>Patient Registration Form</b></font></span> </br> </br>
	 <center> <?php
	include("body/patientreg.php");
 ?></center></br>
	 <div   style="width:400px;margin-left:30px;">
	  <center>
      <form method="post" action="patientreg.php" enctype="multipart/form-data" name="myform" onsubmit="return checkvalidation()">
	<legend align="center"> <font face='monotype corsiva' size='5px' color="red"></font></legend>
		<P > First Name:
		<input type="text" name="fname" id="fname"   required/></br>
		last Name:&nbsp;&nbsp;
		<input type="text" name="lname"id="lname"   required/></br>
				Facality:&nbsp;&nbsp;&nbsp;
		<select name="fackal" id="fackal" required>
			 <option value="-1">School</option>
			  <option value="BRT/">BRT/ </option >
      <option value="BRT/">BRT/ </option >
        <option value="BRT/">BRT/</option >
			</select></br>
		 ID(No.Only):&nbsp;
		 <input type="text" name="patient_id" id="id"  onKeyPress="return onlyNum(event)" required/></br>
		 Batch Of Entry:&nbsp;
		<select name="entry" id="entry" required>
			 <option value="-1">Entry</option>
<option value="/01">/01 </option >
<option value="/02">/02 </option >
<option value="/03">/03</option >
<option value="/04">/04 </option >
<option value="/05">/05 </option >
<option value="/06">/06 </option >
<option value="/07">/07 </option >
<option value="/08">/08 </option >
<option value="/09">/09 </option >
<option value="/10">/10 </option >
<option value="/11">/11 </option >
<option value="/12">/12 </option >
<option value="/13">/13 </option >
<option value="/14">/14 </option >
<option value="/15">/15 </option >
<option value="/16">/16 </option >
<option value="/17">/17 </option >
<option value="/18">/18 </option >
<option value="/19">/19 </option >
<option value="/20">/20 </option > </select></br>
		Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio"  name="sex" id="sex"value="male" title="choose either male by clicking here" required />Male
                         <input type="radio" name="sex" value="female" title='choose female by clicking here' required /> Female</br>
		<p><label for="text_field">BirthDate:</label>
							 <select  style="width: 100px;" id="month" name="birthday_month" onChange="return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(this, &quot;birthday_day&quot;, &quot;birthday_year&quot;);});">
                                  <option value="-1">Month</option>
                                  <option value="January">Jan</option>
                                  <option value="February">Feb</option>
                                  <option value="March">Mar</option>
                                  <option value="April">Apr</option>
                                  <option value="May">May</option>
                                  <option value="June">Jun</option>
                                  <option value="July">Jul</option>
                                  <option value="August">Aug</option>
                                  <option value="September">Sep</option>
                                  <option value="October">Oct</option>
                                  <option value="November">Nov</option>
                                  <option value="December">Dec</option>
                        </select>
						<select name="age" id="day" style="width: 100px;"  onchange="bagofholding" autocomplete="on">
                                  <option value="-1">Day</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                </select>
								   <select name="birthday_year" id="year" style="width: 100px;" onChange="return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(&quot;birthday_month&quot;,&quot;birthday_day&quot;,this);});" autocomplete="on">
                                  <option value="-1">Year</option>

                                  <option value="2011">2011</option>
                                  <option value="2010">2010</option>
                                  <option value="2009">2009</option>
                                  <option value="2008">2008</option>
                                  <option value="2007">2007</option>
                                  <option value="2006">2006</option>
                                  <option value="2005">2005</option>
                                  <option value="2004">2004</option>
                                  <option value="2003">2003</option>
                                  <option value="2002">2002</option>
                                  <option value="2001">2001</option>
                                  <option value="2000">2000</option>
                                  <option value="1999">1999</option>
                                  <option value="1998">1998</option>
                                  <option value="1997">1997</option>
                                  <option value="1996">1996</option>
                                  <option value="1995">1995</option>
                                  <option value="1994">1994</option>
                                  <option value="1993">1993</option>
                                  <option value="1992">1992</option>
                                  <option value="1991">1991</option>
                                  <option value="1990">1990</option>
                                  <option value="1989">1989</option>
                                  <option value="1988">1988</option>
                                  <option value="1987">1987</option>
                                  <option value="1986">1986</option>
                                  <option value="1985">1985</option>
                                  <option value="1984">1984</option>
                                  <option value="1983">1983</option>
                                  <option value="1982">1982</option>
                                  <option value="1981">1981</option>
                                  <option value="1980">1980</option>
                                  <option value="1979">1979</option>
                                  <option value="1978">1978</option>
                                  <option value="1977">1977</option>
                                  <option value="1976">1976</option>
                                  <option value="1975">1975</option>
                                  <option value="1974">1974</option>
                                  <option value="1973">1973</option>
                                  <option value="1972">1972</option>
                                  <option value="1971">1971</option>
                                  <option value="1970">1970</option>
                                </select></p>
		Department:<select name="department" id="dept"  required>
					   <option value="-1">Department</option>
					   <option value="information Technology">Information technology </option >
<option  value="computer science"> computer science </option >
<option value="Information system">cadestral</option >
<option value="civil">Civil</option >
<option value="mechanical">Mechanical</option >
<option value="cotm">Cottom</option >
<option value="servying">Industurial</option >
<option value="Electrical">Electrical</option >
<option value="Biology">ABPE</option >
<option value="Physics">Haydrolics</option >
<option value="Chemistry">ARCH</option >
<option value="Stastics">Urban</option >
<option value="Sport Science">FOOD</option >
</select></br>
		Phone No:&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="phone_no" maxlength='10'  id="phone_no" value="09" onKeyPress="return onlyNum(event)" required/></br>
		Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" id="email"required />
		<input type='hidden' value="Patient" name="user_type" id="user_type" /></br>
		</p>
        <p class="submit" align="right">
		<input type="submit" name="Submit" value="Register" class="button_example"/>
		<input type="reset" name="reset" value="Reset" class="button_example" />
		</p>
		</form>
		
		
	</div>
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
	
<?php
echo(Date(" F d,Y"));
?>
</div>
</body>
</html>
