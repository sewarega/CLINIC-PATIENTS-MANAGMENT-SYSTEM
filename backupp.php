<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['un']);
	unset($_SESSION['fname']);
    unset($_SESSION['lname']);
include 'config.php';
include 'opendb.php';
?>
<?php
$tableName  = '*';
$backupFile = 'backup/mypet.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysql_query($query);


include 'closedb.php';

?>
<?php
include 'config.php';
include 'opendb.php';

$backupFile = $dbname . date("Y-m-d-H-i-s") . '.gz';
$command = "mysqldump --opt -h $mysql_hostname -u $mysql_user -p $mysql_password $mysql_database | gzip > $backupFile";
system($command);

include 'closedb.php';
?>