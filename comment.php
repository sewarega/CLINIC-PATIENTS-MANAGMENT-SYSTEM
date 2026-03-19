<?php
$con = mysql_connect('localhost', 'root', '');
	 if (!$con)
    {
	 die('Could not connect: ' . mysql_error());
	}
	else 
	mysql_select_db("chatandforum", $con);


$alok="  insert into wabibook values ('$_POST[name]','$_POST[email]','$_POST[message]')  ";
if(!mysql_query($alok,$con))

{die('only 500 character message');}
else
echo "message sent";

?>


