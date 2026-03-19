<?php
session_start();
include 'connection.php';
if($log != "log"){
	header ("Location: monitoraccount.php");
}
$user = $_REQUEST['user_id'];
$select = "DELETE FROM account WHERE user_id = '$user'";
mysql_query($select);
mysql_close($db_handle);
print "<script>location.href = 'monitoraccount.php'</script>";
?>