<?php
//index.php 

	//Sets value for current page
	$page_title = "Index | Log-In Demo";
	$current_page = "Index";
	
	//Load header
	include_once('includes/header.inc.php'); 
?>  
<body>
<div class="container">
	<div class="content">
		<section id="home">
			<div class="page-header">
				<h1>Welcome to LetsSplit!</h1>
			</div>
			<div class="row">
				<div class="span16">
				<?php if(isset($_SESSION['logged_in'])) : ?>
				<?php $user = unserialize($_SESSION['user']); ?>
					Hello, <?php echo $user->username; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="settings.php">Change Email</a>
				<?php else : ?>
					You are not logged in. <a href="login.php">Log In</a> | <a href="register.php">Register</a>
				<?php endif; ?>
			</div>
			</div>
			<div class="row">
				<div class="span10">
					<h2>What We Are</h2>
					<p>LetsSplit philosophy is simple: by grouping our users' needs together we can order goods and services in bulk for a lower per individual cost. In short, LetsSplit saves time and organization for vendors and money for consumers.</p>

					<p>While large orders are easier for vendors to fulfill, they often present challenges to the average consumer. The biggest obstacles are:
					<ul>
						<li>Organizing a group with mutual interest in a good/service</li>
						<li>Dividing the costs and purchased goods appropriately</li>
					</ul>
					LetsSplit does all that for you so you can get more for less!</p>

					<p>LetsSplit is perfect for students splitting a cab, groups splitting food, clubs splitting equipment costs.</p>
				</div>
				<div class="span6">
					<h2>How It Works</h2>
					<ol>
						<li>A user signs up and creates a request</li>
						<li>Other users can browse and join in on requests</li>
						<li>Once a request is fulfilled, LetsSplit notifies the users of their individual costs and portions</li>
					</ol>
				</div>
			</div>
		</section>
	</div>
</div>

</body>
</html>