<?php
if(isset($_POST['signup'])){
	include_once 'dbh.inc.php';
	
	$error = false;
	
	$first = mysqli_real_escape_string($conection, $_POST['first']);
	$email = mysqli_real_escape_string($conection, $_POST['email']);
	$uid = mysqli_real_escape_string($conection, $_POST['username']);
	$pwd = mysqli_real_escape_string($conection, $_POST['pwd']);
	$pwd_check = mysqli_real_escape_string($conection, $_POST['pwd_check']);

	//Error handlers
	//Check for empty fields
	if(empty($first) || empty($email) || empty($uid) || empty($pwd) || empty($pwd_check)) {
				

		header("Location: ../signup.php?signup=empty");
		exit('asdfasdf');
		$error = true;
	} else {
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first)){
			
			header("Location: ../signup.php?signup=invalid");
			exit('!!!!!!');
		} else {
			//Check if email isvalid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				header("Location: ../signup.php?signup=email");
				exit('!!!!!!');
			} else{
				
				if($pwd != $pwd_check) {
					
					header("Location: ../signup.php?signup=pwd");
					exit('!!!!!!');				
				} else {
					$sql = "SELECT * FROM users WHERE user_uid = '$uid' ";
					$result = mysqli_query($conn, $sql);
					$resultCeck = mysqli_num_rows($result);
					
					if($resultCheck > 0){
						
						header("Location: ../signup.php?signup=usertaken");
						exit();
					} else {
						
						
							//hashing the password
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
							//insert the user into the database
							$sql = "INSERT INTO users (user_first, user_email, user_uid, user_pwd) VALUES ('$first', '$email', '$uid', '$hashedPwd');";
							mysqli_query($conection, $sql);
							header("Location: ../signup.php?signup=success");
							exit();
						
					}
				}
			}
		}
	}
	
	
} else {
	header("Location: ../signup.php");
	
}

?>