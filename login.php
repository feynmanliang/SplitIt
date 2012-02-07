<?php
//login.php

require_once 'includes/global.inc.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) { 

	$username = $_POST['username'];
	$password = $_POST['password'];

	$userTools = new UserTools();
	if($userTools->login($username, $password)){
		//successful login, redirect them to a page
		header("Location: index.php");
	}else{
		$error = "Incorrect username or password. Please try again.";
	}
}
	//Sets value for current page
	$page_title = "Login | Log-In Demo";
	$current_page = "Login";
	
	//Load header
	include_once('includes/header.inc.php'); 
?>  
<body>
<div class="container">
	<div class="content">
		<section id="login">
			<div class="row">
				<div class="span16">
					<?php
					if($error != "")
					{
					    echo $error."<br/>";
					}
					?>
					<!--
					 	<form action="login.php" method="post">
						    Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
						    Password: <input type="password" name="password" value="<?php echo $password; ?>" /><br/>
						    <input type="submit" value="Login" name="submit-login" />
						</form>
					 -->
				</div>
			</div>
 		</section>
 	</div>
 </div>
</body>
</html>