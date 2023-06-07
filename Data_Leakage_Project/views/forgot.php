<?php 
	if(isset($_POST['reset'])){
		$email=sanitize($_POST['email']);
		$result=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($result)>0){
			$rows=mysqli_fetch_array($result);
			if($rows['admin_active'] == "1"){
				$_SESSION['user_id']=$rows['id'];
				$_SESSION['username']=$rows['username'];
				$_SESSION['profile']=$rows['profile'];
				$_SESSION['user_type']=$rows['user_type'];
				$_SESSION['is_login']="loginned";
				$url="change_password.php";
				$_SESSION['success_message']="Email ID Exists!You can proceed!";
				header("Location:$url");
				exit();				
			}
			else{
				echo "Sorry mail ID not Exists or Your account not approved by admin.";
			}			
		}
		
	}
 ?>
 <?php
 if(isset($_POST['changePassword'])){
    $password = sanitize($_POST['password']);
    $confirmPassword = sanitize($_POST['confirmPassword']);
    
    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Use 8 or more characters with a mix of letters, numbers & symbols';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Password not matched';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE users SET password = '$password' WHERE email = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
            $url="login.php";
			$_SESSION['success_message']="Your password change is successfully!";
			header("Location:$url");
			exit();	
           
        }
    }
}
?>