<?php
//register.php

require_once 'includes/global.inc.php';

//initialize php variables used in the form
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$firstname = "";
$lastname = "";
$phone = "";
$school = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$school = $_POST['school'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();

	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkUsernameExists($username))
	{
	    $error .= "That username is already taken.<br/> \n\r";
	    $success = false;
	}

	//check to see if passwords match
	if($password != $password_confirm) {
	    $error .= "Passwords do not match.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //prep the data for saving in a new user object
	    $data['username'] = $username;
	    $data['password'] = md5($password); //encrypt the password for storage
	    $data['email'] = $email;

	    //create the new user object
	    $newUser = new User($data);

	    //save the new user to the database
	    $newUser->save(true);

	    //log them in
	    $userTools->login($username, $password);

	    //redirect them to a welcome page
	    header("Location: welcome.php");

	}

}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
	//Sets value for current page
	$page_title = "Registration | Log-In Demo";
	$current_page = "registration";
	
	//Load header
	include_once('includes/header.inc.php'); 
?>  
<body>
<div class="container">
	<div class="content">
	<section id="Settings">
		<div class="page-header">
			<h1>Registration</h1>
		</div>
		<div class="row">
			<div class="span4">
				JavaScript description of highlighted element
			</div>
			<div class="span12">
				<form action="register.php" method="post">
				<fieldset>
					<div class="clearfix">
						<label for="username">Username:</label>
						<div class="input">
							<input class="xlarge" id="username" name="username" size="30" type="text" value="<?php echo $username; ?>" />
						</div>
					</div>
					<div class="clearfix">
						<label for="password">Password:</label>
						<div class="input">
							<input class="xlarge" id="password" name="password" size="30" type="password" value="<?php echo $password; ?>" />
						</div>
					</div>
					<div class="clearfix">
						<label for="password-confirm">Password (confirm):</label>
						<div class="input">
							<input class="xlarge" id="password-confirm" name="password-confirm" size="30" type="password" value="<?php echo $password_confirm; ?>" />
						</div>
					</div>
					<div class="clearfix">
						<label for="email">E-Mail:</label>
						<div class="input">
							<input class="xlarge" id="email" name="email" size="30" type="text" value="<?php echo $email; ?>" />
						</div>
					</div>
					<div class="clearfix">
						<label for="firstname">First Name:</label>
						<div class="input">
							<input class="input-medium" id="firstname" name="firstname" size="30" type="text" value="<?php echo $firstname; ?>" /><br/>
						</div>
					</div>
					<div class="clearfix">
						<label for="lastname">Last Name:</label>
						<div class="input">
							<input class="input-medium" id="lastname" name="lastname" size="30" type="text" value="<?php echo $lastname; ?>" /><br/>
						</div>
					</div>
					<div class="clearfix">
						<label for="phone">Phone:</label>
						<div class="input">
							<input class="input-medium" id="email" name="phone" size="30" type="text" value="<?php echo $phone; ?>" /><br/>
						</div>
					</div>
					<div class="clearfix">
						<label for="school">School:</label>
						<div class="input">
						<select name="school" id="school">
							<option value="amherst">Amherst</option>
							<option value="hampshire">Hampshire</option>	
							<option value="moho">Mt. Holyoke</option>
							<option value="smith">Smith</option>
						</select>
					</div>
					<div class="actions">
							<?php echo ($error != "") ? $error : ""; ?>
						<input type="submit" class="btn primary" value="Update" name="submit-settings" />
						 
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
				</form>
			</div>
		</div>
	</section>
	</div>
</div>
</body>
</html>
