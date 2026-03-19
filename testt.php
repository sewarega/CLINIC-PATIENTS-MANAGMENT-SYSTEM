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
		
			<div  class="flt rp_block" style="margin-left:120px;">	        
	<p ><font color="#006699" size="4" face="cambria, Helvetica, sans-serif">If you want to Print this page Click here</font>
	<a href="#"  onClick="printF('printData')" title="Print this page">&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/print_icon.JPG" width="40px" height="40"></a></p> <br/>
<div id="printData">
<center>
<img src="img/z.PNG" class="img-circ"width="100px" height="100px">
<div style="width:660px;height:80px; ">
<div style="float:left;width:270px "><font size="5"><b>Genenal Report</b></font></div>
<div style="float:right;width:180px;text-align:justify;">
<b>AU IoT CLINIC OFFICE<br/>
<font color="#90a7ad">Done By Lab Clerk<br/>
Created:
<?php
echo(Date(" F d,Y"));
?><br/><br/></font></b></div>
<br/><br/><br/>
<hr>
</div></center><br/>			
     <div  style="margin-left:0px;">			
<script type="text/javascript">
function showDiv(prefix,chooser) 
{
        for(var i=0;i<chooser.options.length;i++) 
		{
        	var div = document.getElementById(prefix+chooser.options[i].value);
            div.style.display = 'none';
        }
 
		var selectedOption = (chooser.options[chooser.selectedIndex].value);
		if(selectedOption == "1")
		{
			displayDiv(prefix,"1");
		}
		if(selectedOption == "2")
		{
			displayDiv(prefix,"2");
		}
		if(selectedOption == "3")
		{
			displayDiv(prefix,"3");
		}
		if(selectedOption == "4")
		{
			displayDiv(prefix,"4");
		}
		if(selectedOption == "5")
		{
			displayDiv(prefix,"5");
		}
} 
function displayDiv(prefix,suffix) 
{
        var div = document.getElementById(prefix+suffix);
        div.style.display = 'block';
}
</script>
	 <table id="contentbox">
		<tr>
			<td id="content">
				<div id="report">
				Select category:
				<select name="portal" id="cboOptions" onChange="showDiv('div',this)">
					<option value="1">...</option>
					<option value="2">Lab</option>
					<option value="4">far</option>
					<option value="5">fjfj</option>
				</select>
				<br /><br />
						  
				<div id="div1" style="display:none;"></div>	
				<div id="div2" style="display:none;">
					<form action="" method="post" >
<center><b>Clinic Labratory Reports</b></center> 
  <div align="center">From:&nbsp;<strong><?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:&nbsp;<strong><?php echo $_POST['dayto']; ?></strong></div> <br/><br/> 
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" id="mytable">
          <thead>
            <tr bgcolor="#cccccc" style="margin-bottom:10px;">
              		<th width="164"><div align="center">Result ID</div></th>
					<th width="136"><div align="center">Patient ID</div></th>
					<th width="114"><div align="center">Lab Result</div></th>					
					<th width="108"><div align="center">Lab Test Date</div></th>
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
								$result3 = mysql_query("SELECT * FROM labresulttable where ltdate BETWEEN '$a' AND '$b'");
								
								if (($result3 == 0))
                               {
                        echo "<h4>Results</h4>";
                        echo "<p>Sorry,Entered Report Date ".$_POST['ltdate']." is not exist. Enter the correct Report date.</p>";
		                        }	 
		                      else{
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								 $dasd=$row3['ltdate'];
								 $result4 = mysql_query("SELECT * FROM labresulttable where ltdate='$dasd'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
									//echo '<td><div align="center">'.$row4['report_id'].' '.$row4['report_date'].'</div></td>';
									}
									
									echo '<td><div align="center">'.$row3['labresult_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['patient_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['labresultdes'].'</div></td>';						
									echo '<td><div align="center">'.$row3['ltdate'].'</div></td>';
								 echo '</tr>';
							}
								  }
						}
			  ?>
          </tbody>
</table>
					</form>
				</div>		
				<div id="div4" style="display:none;">
					<form action="" method="post">
					<center><b>pharmacy Reports</b></center> 
  <div align="center">From:&nbsp;<strong><?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:&nbsp;<strong><?php echo $_POST['dayto']; ?></strong></div> <br/><br/> 
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" id="mytable">
          <thead>
            <tr bgcolor="#cccccc" style="margin-bottom:10px;">
              		<th width="164"><div align="center">Result ID</div></th>
					<th width="136"><div align="center">Patient ID</div></th>
					<th width="114"><div align="center">Lab Result</div></th>					
					<th width="108"><div align="center">Lab Test Date</div></th>
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
								$result3 = mysql_query("SELECT * FROM labresulttable where ltdate BETWEEN '$a' AND '$b'");
								
								if (($result3 == 0))
                               {
                        echo "<h4>Results</h4>";
                        echo "<p>Sorry,Entered Report Date ".$_POST['ltdate']." is not exist. Enter the correct Report date.</p>";
		                        }	 
		                      else{
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								 $dasd=$row3['ltdate'];
								 $result4 = mysql_query("SELECT * FROM labresulttable where ltdate='$dasd'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
									//echo '<td><div align="center">'.$row4['report_id'].' '.$row4['report_date'].'</div></td>';
									}
									
									echo '<td><div align="center">'.$row3['labresult_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['patient_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['labresultdes'].'</div></td>';						
									echo '<td><div align="center">'.$row3['ltdate'].'</div></td>';
								 echo '</tr>';
							}
								  }
						}
			  ?>
          </tbody>
</table><center><b>general Reports</b></center> 
  <div align="center">From:&nbsp;<strong><?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:&nbsp;<strong><?php echo $_POST['dayto']; ?></strong></div> <br/><br/> 
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" id="mytable">
          <thead>
            <tr bgcolor="#cccccc" style="margin-bottom:10px;">
              		<th width="164"><div align="center">Result ID</div></th>
					<th width="136"><div align="center">Patient ID</div></th>
					<th width="114"><div align="center">Lab Result</div></th>					
					<th width="108"><div align="center">Lab Test Date</div></th>
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
								$result3 = mysql_query("SELECT * FROM labresulttable where ltdate BETWEEN '$a' AND '$b'");
								
								if (($result3 == 0))
                               {
                        echo "<h4>Results</h4>";
                        echo "<p>Sorry,Entered Report Date ".$_POST['ltdate']." is not exist. Enter the correct Report date.</p>";
		                        }	 
		                      else{
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								 $dasd=$row3['ltdate'];
								 $result4 = mysql_query("SELECT * FROM labresulttable where ltdate='$dasd'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
									//echo '<td><div align="center">'.$row4['report_id'].' '.$row4['report_date'].'</div></td>';
									}
									
									echo '<td><div align="center">'.$row3['labresult_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['patient_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['labresultdes'].'</div></td>';						
									echo '<td><div align="center">'.$row3['ltdate'].'</div></td>';
								 echo '</tr>';
							}
								  }
						}
			  ?>
          </tbody>
</table>
					</form>
				</div>
				<div id="div5" style="display:none;">
					<form action="" method="post">
<center><b>Clinic Labratory Reports</b></center> 
  <div align="center">From:&nbsp;<strong><?php echo $_POST['dayfrom']; ?></strong>&nbsp;&nbsp;To:&nbsp;<strong><?php echo $_POST['dayto']; ?></strong></div> <br/><br/> 
<table width="600" border="1" align="center" cellpadding="0" cellspacing="0" id="mytable">
          <thead>
            <tr bgcolor="#cccccc" style="margin-bottom:10px;">
              		<th width="164"><div align="center">Result ID</div></th>
					<th width="136"><div align="center">Patient ID</div></th>
					<th width="114"><div align="center">Lab Result</div></th>					
					<th width="108"><div align="center">Lab Test Date</div></th>
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
								$result3 = mysql_query("SELECT * FROM labresulttable where ltdate BETWEEN '$a' AND '$b'");
								
								if (($result3 == 0))
                               {
                        echo "<h4>Results</h4>";
                        echo "<p>Sorry,Entered Report Date ".$_POST['ltdate']." is not exist. Enter the correct Report date.</p>";
		                        }	 
		                      else{
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
								 $dasd=$row3['ltdate'];
								 $result4 = mysql_query("SELECT * FROM labresulttable where ltdate='$dasd'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
									//echo '<td><div align="center">'.$row4['report_id'].' '.$row4['report_date'].'</div></td>';
									}
									
									echo '<td><div align="center">'.$row3['labresult_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['patient_id'].'</div></td>';
									echo '<td><div align="center">'.$row3['labresultdes'].'</div></td>';						
									echo '<td><div align="center">'.$row3['ltdate'].'</div></td>';
								 echo '</tr>';
							}
								  }
						}
			  ?>
          </tbody>
</table>
					</form>
				</div>
				</div>
			</td>
		</tr>
	</table>
  </div></div></br></br>
 

			
		 
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