<?php 
include "connection.php"; /** calling of connection.php that has the connection code **/ 

$id = $_GET['patient_id']; /** get the patient ID ***/

mysql_query("DELETE FROM user where patient_id = '$id'"); /** execute the sql delete code **/

header("Location: updateuserserch.php"); /** redirect to deletepatient.php **/

 ?>