<?php 
include "connection.php"; /** calling of connection.php that has the connection code **/ 

$pid = $_GET['patient_id']; /** get the patient ID ***/

$sql="DELETE FROM patient_table where patient_id = '$pid'"; /** execute the sql delete code **/
$a=mysql_query($sql) or die(mysql_error());
 if($a)
 {
echo"<script> alert('successfuly deleted!!');</script>";
include("searchupdate.php"); /** redirect to deletepatient.php **/
 }
 else{
 include("searchupdate.php");
 echo"<font size='3px'  color='red'>failed deletion!!</font>";
 }
 ?>
 
 
 
 