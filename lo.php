<?php
	if(isset($_POST['login']))
 {
   $user =$_POST['user_name'];
   $_SESSION['user_name']=$_POST['user_name'];
   $password=($_POST['Password']);
    $_SESSION['Password']=$_POST['Password'];
	// To protect MySQL injection (more detail about MySQL injection)
	$user =stripslashes($user);
	$password=stripslashes($password);
	$user =mysql_real_escape_string($user);
	$password=mysql_real_escape_string($password);
   $query = "SELECT * FROM  account WHERE 	user_name= '{$user}' AND Password= '{$password}';";
	$result = mysql_query($query);

	
		$rowCheck = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		 if($row['user_type']=='Doctor'){
		$_SESSION['user_name']=$row['user_name'];
           echo "<script>window.location='doctorpage.php';</script>";
			}
			else if($row['user_type']=='Pharmasist'){
		$_SESSION['user_name']=$row['user_name'];
         echo "<script>window.location='pharmacist.php';</script>";
			}
			else if($row['user_type']=='Lab tecnitian'){
		$_SESSION['user_name']=$row['user_name'];
         echo "<script>window.location='labratoristpage.php';</script>";
			}
			else if($row['user_type']=='Patient'){
		$_SESSION['user_name']=$row['user_name'];
		$_SESSION['patient_id']=$row['patient_id'];
         echo "<script>window.location='patientpage.php';</script>";
			}
			else if($row['user_type']=='Clerk'){
		$_SESSION['user_name']=$row['user_name'];
        echo "<script>window.location='clerkpage.php';</script>";
			}
			else if($row['user_type']=='Admin'){
		$_SESSION['user_name']=$row['user_name'];
         echo "<script>window.location='admin.php';</script>";
			}
		else {
		echo"<p  class='wrong'>User Name or/and Password Not Match !!</p>";
            echo '<script type="text/javascript">alert("Wrong UserID or Password"); window.location='login.php'</script>';
            echo '<script type="text/javascript">alert("User Name or/and Password Not Match !!");window.location=\'login.php\';</script>'.mysql_error();
		}
}