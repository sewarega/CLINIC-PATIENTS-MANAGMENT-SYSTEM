<?php
$co=mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("Auclinic_database",$co)or die(mysql_error());  	

if(isset($_GET['status']))
{
	$status=$_GET['status'];
	
	$false=mysql_query("select * from account where user_id='$status'");
	while($row=mysql_fetch_object($false))
	{
		$best=$row->status;
	
	if($best=='0')
	{
		$active=1;
	}
	else
	{
		$active=0;
	}
	$update=mysql_query("update account set status='$active' where user_id='$status' ");
	if($update)
	{
		header("Location:monitoraccount.php");
	}
	else
	{
		echo mysql_error();
	}
	}
	?>
     
    <?php
}
?>