<html>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
  <?php
$pid=$_SESSION['patient_id'];
					$sql= "SELECT * FROM patient_table where patient_id='$pid'";
					$sql1= "SELECT labresult_id,patient_id,labresultdes,ltdate,ltname FROM labresulttable where patient_id='$pid'";
					$sql2= "SELECT patient_id,pname,dname,drug_type,quantity,pdname,date FROM drugdelivertable where patient_id='$pid'";
					$cha1=mysql_query($sql);
					$c=mysql_query($sql1);
					$c1=mysql_query($sql2);
					$count=mysql_num_rows($cha1);
					$count1=mysql_num_rows($c);
					$count2=mysql_num_rows($c1);
					
					if($count < 1)
					{
					echo"<center>";
					echo"<br><br>";
					echo('<font color="black" size="4px">Please enter correct id number, this patient id Number is not found</font>');
					echo' <meta content="8;patientdetailpage.php" http-equiv="refresh" />';
					
					}
					else
					{	
					echo"<center>";
					echo "<h3>Basic Patient Information<br><hr></h3>";
				
if($count1 < 1)
{
  echo "<p><h5><i>Patient with patient ID No. " .$pid. " did't have laboratory services.</i></h5></p>";
  }
  else{

					echo"<center>";
					echo "<h4>Laboratory test result detials</h4>";
				
echo "<table class='table' style='width:300px;height:50px;border-radius:10px;border-radius:10px;border:px solid #336699' align='center'>
<tr >
<th bgcolor=''><font color='black'>Lab_Test_ID</th>
<th bgcolor=''><font color='black'>Patient_ID</th>
<th bgcolor=''><font color='black'>Test_Result</th>
<th bgcolor=''><font color='black'>Lab_Test_date</th>
<th bgcolor=''><font color='black'>Lab_Technician</th>
</tr>";
while($row = mysql_fetch_array($c))
  {
  print ("<tr  bgcolor=''>");
  print ("<td>" . $row['labresult_id']. "</td>");
  print ("<td>" . $row['patient_id']. "</td>");
  print ("<td>" . $row['labresultdes']. "</td>"); 
  print ("<td>" . $row['ltdate']. "</td>"); 
  print ("<td>" . $row['ltname']. "</td>");     
  print ("</tr>");
  }
print( "</table>");
echo"</center>";
echo"";

if($count2 < 1)
{
  echo "<p><h5><i>Patient with patient ID No. " .$pid. " did't have pharmacy services.</i></h5></p>";
  }
  else{

					echo"<center><hr>";
					echo "<h4>Drug supply details</h4>";
				echo"</center>";
echo "<table  class='table' style='width:300px;height:50px;border-radius:10px;border-radius:10px;border:px solid #336699' align='left'>
<tr >

<th bgcolor=''><font color='black'>Patient_ID</th>
<th bgcolor=''><font color='black'>Patient_name</th>
<th bgcolor=''><font color='black'>Drug_name</th>
<th bgcolor=''><font color='black'>Drug_type/Quantity</th>
<th bgcolor=''><font color='black'>Phrmasist</th>
<th bgcolor=''><font color='black'>Deliver_date</th>
</tr>";
while($row = mysql_fetch_array($c1))
  {
  print ("<tr  bgcolor=''>");

  print ("<td>" . $row['patient_id']. "</td>");
  print ("<td>" . $row['pname']. "</td>"); 
  print ("<td>" . $row['dname']. "</td>"); 
  print ("<td>" . $row['drug_type'] .'&nbsp;&nbsp;'.$row['quantity']. "</td>");
  print ("<td>" . $row['pdname']. "</td>"); 
  print ("<td>" . $row['date']. "</td>");     
  print ("</tr>");
  }
print( "</table>");


}

}
}

?>
</body>
</html>