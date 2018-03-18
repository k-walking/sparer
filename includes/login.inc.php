<?php

session_start();
if(isset($_POST['login'])){
	include_once 'dbh.inc.php';
	
	$error = false;
	
	
	$uid = mysqli_real_escape_string($conection, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conection, $_POST['pwd']);
	
	//Error handlers
	//Check for empty fields
	if(empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		//check if username exist
		$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email='$uid'";
		$result = mysqli_query($conection, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck < 1){
			header("Location: ../index.php?login=erroralreadyexists");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				//de-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				
				if($hashedPwdCheck == false) {
					header("Location: ../index.php?login=errorpwd");
					exit();
				} else if($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	}	
	
} else {
	header("Location: ../index.php?login=error");
	exit();
	
}

?>