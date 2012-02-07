<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.css">
	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <style type="text/css">
    	body {
    		padding-top: 40px;
    	}
		input
		{
	       height: 28px;
		}
    </style>
    
    
    <?php 
    	require_once 'includes/global.inc.php'; 
    	require_once 'login.php';
    ?>
    
    <title><?php echo $page_title; ?></title>
</head>
<div class="topbar">
	<div class="fill">
		<div class="container">
			<a class="brand" href="#">LetsSplit (beta)</a>
			<ul class="nav">
				<li><a href="index.php">Index</a></li>
				<li><a href="welcome.php">Welcome</a></li>
				<li><a href="settings.php">Settings</a></li>
			</ul>
			<?php if(!isset($_SESSION['logged_in'])) : ?>
				<form action="login.php" method="post" class="pull-right">
					<input  class="input-small" name="username" type="text" placeholder="Username" value="<?php echo $username; ?>" />
					<input  class="input-small" name="password" type="password" placeholder="Password" value="<?php echo $username; ?>" />
			    	<button class="btn primary" type="submit" name="submit-login">Sign in</button>
			    	<button class="btn" type="button" name="register" onClick="parent.location='register.php'">Register</button>
				</form>
			<?php else : ?>
				<form action="logout.php" method="link" class="pull-right">
			    	<button class="btn primary" type="submit" name="logout">Log Out</button>
				</form>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
