<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
<?php include_once("../sanitize.php"); ?>
<?php include_once("forgot.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Team 7_Data leakage and security</title>
	<?php include_once("bootstrap.php"); ?>
	<style>
	ded, to get the result that you can see in the preview selection

body{
    margin-top:20px;
    background: #f6f9fc;
}
.account-block {
    padding: 0;
    background-image: url(https://bootdey.com/img/Content/bg1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
.account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.4);
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #5369f8 !important;
}

.btn-theme {
    background-color: #5369f8;
    border-color: #5369f8;
    color: #fff;
}
	</style>
</head>
<body class="login_background">
	<?php include_once("menubar.php"); ?>

	
	<?php include_once("success_message.php"); ?>						
<?php 
	if(isset($_POST['login'])){
		$email=sanitize($_POST['email']);
		$password=sanitize($_POST['password']);
		$result=mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($result)>0){
			$rows=mysqli_fetch_array($result);
			if($rows['admin_active'] == "1"){
				$_SESSION['user_id']=$rows['id'];
				$_SESSION['username']=$rows['username'];
				$_SESSION['profile']=$rows['profile'];
				$_SESSION['user_type']=$rows['user_type'];
				$_SESSION['is_login']="loginned";
				$url="dashboard.php";
				$_SESSION['success_message']="You are successfully loginned.";
				header("Location:$url");
				exit();				
			}
			else{
				echo "<div class='alert alert-warning'>Failed to login: Your account not approved by admin.</div>";
			}			
		}
		else{
			?>
<div class="alert alert-danger">
Invalid email id or password
</div>		
<?php
		}
	}
 ?>
 
 <div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your email address and password to access your account.</p>
 						<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						 <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    
                                    <input type="submit" name="login" value="Login" class="btn btn-theme">
                                    &nbsp; &nbsp; &nbsp; &nbsp; 
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#forgot" >Forgot password?</a>
                                </form>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Data Leakage and Security</h4>
                                    <p class="lead text-white">Data leakage is the big challenge in front of the industries & different institutes. Though there are number of systems designed for the data security by using different encryption algorithms, there is a big issue of the integrity of the users of those systems. It is very hard for any system administrator to trace out the data leaker among the system users. It creates a lot many ethical issues in the working environment of the office.</p>
                                    <p>Admin/User login page</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="register.php" class="text-primary ml-1">register</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
<div class="modal top fade" id="forgot" tabindex="-1" aria-labelledby="forgot" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" >
  <div class="modal-dialog" style="width: 300px;">
        <div class="modal-content text-center">
            <div class="modal-header h5 text-white bg-primary justify-content-center">
                Password Reset
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>  
            </div>
            
            <div class="modal-body px-5">
                <p class="py-2">
                    Enter your email address to reset your password.
                </p>
                
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control my-3" name="email">
                                    </div>
                <input type="submit" name="reset" value="Reset password" class="btn btn-primary w-100">
                
                <div class="d-flex justify-content-between mt-4">
                    <a class="" href="login.php">Login</a>
                    <a class="" href="register.php">Register</a>
                </div>
            </div>
        </div>
</form>

 
    </div>
   
</div>
	
</body>
</html>