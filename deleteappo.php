<?php
$conn=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$conn);
$id = $_REQUEST['id'];
$sql="DELETE FROM appo WHERE patient_id='$id'";
$a=mysql_query($sql) or die(mysql_error());
 if($a)
 {
echo"<script> alert('successfuly deleted!!');</script>";
include("apporsee.php");  /** redirect to deletepatient.php **/
 }
else{
 include("apporsee.php");
 echo"<font size='3px'  color='red'>failed deletion!!</font>";
 }   
 
?>
