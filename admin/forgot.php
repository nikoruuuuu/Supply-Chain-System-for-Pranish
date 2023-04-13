<?php 
session_start();
$error = array();

require "mail.php";

	if(!$con = mysqli_connect("localhost","id20503618_root","KGKe4a5e^G\DT=D=","id20503618_isms_db")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);

					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: login.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($password){
		
		global $con;
// 		$password = mb($password, PASSWORD_DEFAULT);
		$email = addslashes($_SESSION['forgot']['email']);
        		$_POST['password'] = md5($_POST['password']);
		extract($_POST);
		$data = '';
		foreach($_POST as $k => $v){
			if(!in_array($k,array('id'))){
				if(!empty($data)) $data .=" , ";
				$data .= " {$k} = '{$v}' ";
			}
		}
		$query = "update users set password = '$password' where email = '$email' limit 1";
		mysqli_query($con,$query);
	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from users where email = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot</title>
</head>
<body>
<style type="text/css">
	
	*{
		font-family: tahoma;
		font-size: 13px;
		 text-align: center;
	}

    .btn {
    border: 1px solid transparent;
    font-size: 1rem;
    border-radius: 0.25rem;
    font-weight: 400;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    		padding: 5px 5px;
		width: 260px;
	margin-bottom: 10px;
    }
	form{
		width: 300px;
		margin: auto;
		border: solid thin #ccc;
		padding: 10px;
	}

	.textbox{
		padding: 5px;
		width: 250px;
	}
	a{
	    color: #007bff;
    text-decoration: none;
    background-color: transparent;
        font-size: 1.1rem;
	}
	
</style>

		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
					  <div class="logo" id="logo"><img src="logo.jpg" alt="Pranish Inc. Logo"></div>
						<form method="post" action="forgot.php?mode=enter_email"> 
							<h1>Forgot Password</h1>
							<h3>Enter your email below</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>
							<input class="textbox" type="email" name="email" placeholder="Email"><br>
							<br style="clear: both;">
							<input class="btn" type="submit" value="Next">
							<br><br>
							<div><a href="login.php">Go back To Login</a></div>
						</form>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
										  <div class="logo" id="logo"><img src="logo.jpg" alt="Pranish Inc. Logo"></div>
						<form method="post" action="forgot.php?mode=enter_code"> 
							<h1>Forgot Password</h1>
							<h3>Enter your the code sent to your email</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="code" placeholder="12345"><br>
							<br style="clear: both;">
							<input class="btn" type="submit" value="Next">
							<a href="forgot.php">
								<input class="btn" type="button" value="Start Over">
							</a>
							<br><br>
							<div><a href="login.php">Go back To Login</a></div>
						</form>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
										  <div class="logo" id="logo"><img src="logo.jpg" alt="Pranish Inc. Logo"></div>
						<form method="post" action="forgot.php?mode=enter_password"> 
							<h1>Forgot Password</h1>
							<h3>Enter your new password</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="password" placeholder="Password"><br>
							<input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
							<br style="clear: both;">
							<input class="btn" type="submit" value="Next">
							<a href="forgot.php">
								<input class="btn" type="button" value="Start Over">
							</a>
							<br><br>
							<div><a href="login.php">Go back To Login</a></div>
						</form>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>


</body>
</html>