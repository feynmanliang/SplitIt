<?php
//welcome.php



//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: index.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//Sets value for current page
$page_title = "Welcome | Log-In Demo";
$current_page = "Welcome";
	
//Load header
include_once('includes/header.inc.php'); 
?>  
<body>
<div class="container">
	<div class="content">
	  Hey there, <?php echo $user->username; ?>. You've been registered and logged in. Welcome! <a href="logout.php">Log Out</a> | <a href="index.php">Return to Homepage</a>
	</div>
</div>
</body>
</html>
