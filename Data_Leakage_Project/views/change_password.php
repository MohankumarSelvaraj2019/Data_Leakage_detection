<?php require_once("../server/connect.php"); ?>
<?php include_once("../session.php"); ?>
<?php include_once("../sanitize.php"); ?>
<?php include_once ("forgot.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <?php include_once("bootstrap.php"); ?>
    <style>
        
{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}
body
{
    height: 100vh;
    width: 100%;
    display: grid;
    place-items: center;
    background: #0557ee;
}
#container
{
    height: auto;
    width: 450px;
    background: #fff;
    padding: 25px;
    border-radius: 5px;
    position: relative;
    box-shadow: -2px 2px 12px rgba(0,0,0,0.3);
}
#container h2
{
    font-size: 40px;
}
#container p
{
    padding: 6px 0 5px 0;
    font-size: 18px;
    color: #000000a1;
}
#container #line
{
    height: 1px;
    width: 100%;
    background: #00000060;
    margin: 10px 0 20px 0;
}
#alert
{
    height: auto;
    width: 100%;
    background: #ee05503b;
    padding: 0 15px;
    font-size: 19px;
    line-height: 40px;
    margin: 10px 0;
    color: #000;
    border-radius: 4px;
}
#container input
{
    height: 40px;
    width: 99%;
    margin: 5px 0;
    border: 1px solid #00000031;
    font-size: 15px;
    background: #f5f6f7;
    outline: none;
    border-radius: 6px;
    padding: 0px 12px;
}
#container input[type="submit"]
{
    height: 45px;
    border: none;
    background: #0557ee;
    color: #fff;
    font-size: 20px;
    margin: 5px 0;
    cursor: pointer;
}
    </style>
    
</head>
<body class="login_background">
	<?php include_once("menubar.php"); ?>

	
	<?php include_once("success_message.php"); ?>
<div id="container">
        <h2>Password</h2>
        <p>It's quick and easy.</p>
        <div id="line"></div>
        <form action="change_password.php" method="POST" autocomplete="off">
           
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" required><br>
            <input type="submit" name="changePassword" value="Save">
        </form>
    </div>
</body>
</html>