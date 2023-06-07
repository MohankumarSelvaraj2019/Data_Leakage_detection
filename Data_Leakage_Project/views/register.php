<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
<?php include_once("../sanitize.php"); ?>
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

	<div id="main-wrapper" class="container">
	    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
								
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">GET STARTED-></h3>
                                </div>
    
                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your Details to create account.</p>
 
<?php 
	if(isset($_POST['register'])){
		$username=sanitize($_POST['username']);
		$email=sanitize($_POST['email']);
		$password=sanitize($_POST['password']);
		$cpassword=sanitize($_POST['cpassword']);
		$gender=sanitize($_POST['gender']);
		$mobile=sanitize($_POST['mobile']);

		if(empty($username)){
			echo "Username is required.";
			exit();
		}
		if(empty($email)){
			echo "Email id is required.";
			exit();
		}
		if(empty($password)){
			echo "Password is required.";
			exit();
		}
		if(empty($cpassword)){
			echo "Confirm password is required.";
			exit();
		}		
		$result=mysqli_query($conn, "INSERT INTO users(username, email, password,user_type,gender,mobile,admin_active,blocked,profile)VALUES('$username', '$email', '$password','user','$gender','$mobile','0','0','user_profile.jpg')");
		if($result){
			$_SESSION['success_message']="Your account created successfully, now login.";
			header("Location:login.php");
			exit();			
		}
		else{
			echo "Something wrong, try again.";
		}
	}
 ?>
						<form action="<?=$_SERVER['PHP_SELF']?>" method='POST'>
							<div class="mb-2">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" required autofocus>
							</div>
							<div class="mb-2">
								<label for="email">Email id</label>
								<input type="text" name="email" class="form-control" required>
							</div>
							<div class="mb-2">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>

							<div class="mb-2">
								<label for="cpassword">Confirm Password</label>
								<input type="password" name="cpassword" class="form-control" required>
							</div>
							<div class="mb-2">
							<p>Gender:
							<input type="radio" name="gender" value="male"> Male
							<input type="radio" name="gender" value="female"> Female
							<input type="radio" name="gender" value="other"> Other
							</p></div>
                            <div class="mb-2">
								<label for="mobile">Mbile.No</label>
								<input type="mobile" name="mobile" class="form-control" required>
							</div>
							<div class="mb-2 text-center">
								<input type="submit" name="register" value="Register" class="btn btn-primary">
							</div>
							

							<div class="mb-2 text-center">
								<a href="login.php" class="text-decoration-none">Already have an account?</a>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-left">
                                <div class="overlay rounded-left"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Data Leakage and Security</h4>
                                    <p class="lead text-white">The data leakage detection industry is very heterogeneous as it evolved out of ripe product lines of leading IT security vendors. A broad arsenal of enabling technologies such as firewalls, encryption, access control, identity management, machine learning content/context-based detectors and others have already been incorporated to offer protection against various facets of the data leakage threat.</p>
                                    <p>User Registration page</p>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
		</div>
		<!-- row -->
	</div>
	</div>
        <!-- end col -->
    </div>
    <!-- Row -->
</body>
</html>