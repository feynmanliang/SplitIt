<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: index.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//initialize php variables used in the form
$email = $user->email;
$firstname = $user->firstname;
$lastname = $user->lastname;
$phone = $user->phone;
$school = $user->school;
$message = "";

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$school = $_POST['school'];

	$user->email = $email;
	$user->firstname = $firstname;
	$user->lastname = $lastname;
	$user->phone = $phone;
	$user->school = $school;
	$user->save();

	$message = "Settings Saved<br/>";
}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again

	//Sets value for current page
	$page_title = "Settings | Log-In Demo";
	$current_page = "settings";
	
	//Load header
	include_once('includes/header.inc.php'); 
?>  
<body>
<div class="container">
	<div class="content">
	<section id="Settings">
		<div class="page-header">
			<h1>Settings</h1>
		</div>
		<div class="row">
			<div class="span4">
				JavaScript description of highlighted element
			</div>
			<div class="span12">
				<form action="settings.php" method="post">
				<fieldset>
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
							<?php echo $message.'<br \>'; ?>
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
