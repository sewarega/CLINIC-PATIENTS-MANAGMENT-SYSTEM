<?php
$conn=mysql_connect("localhost","root","");
$db1=mysql_select_db("Auclinic_database",$conn);
$id = $_REQUEST['id'];
$sql="DELETE FROM drugtable WHERE dcode='$id'";
$a=mysql_query($sql) or die(mysql_error());
 if($a)
 {
echo"<script> alert('successfuly deleted!!');</script>";
//header('Location: checkexpire.php');
include("checkexpire.php");  /** redirect to deletepatient.php **/
 }
else{
 include("checkexpire.php");
 echo"<font size='3px'  color='red'>failed deletion!!</font>";
 }   
 
?>
