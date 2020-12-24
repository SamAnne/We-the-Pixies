<?php
	$loggedin = "";

	session_start();
	require_once('config.php');

	if(isset($_SESSION["loggedin"])){
		$loggedin = $_SESSION["loggedin"];
		$username = $_SESSION["username"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"/>
       
	<title>We The Pixies</title>
</head>
<body>

	<div class="bg">
		<?php
			if($loggedin == true ){
		?>
				<button class="welcome">Welcome, <?php echo $username ?></button>
				<button class="login-button" onclick="window.location.href='logout.php'">Log Out</button>
		<?php   } 
			else{

		?>
				<button class="login-button" onclick="window.location.href='login.php'">Log In</button>
		<?php   } ?>
		<div class="contentarea">
			<button class="play-button" onclick="window.location.href='//wethepixies.net'" type="submit"></button>
			<!-- SIDEBAR -->
			<div class="top-sidebar">
				<div class="bottom-sidebar">
					<button class="logo-button" title="Home" onclick="window.location.href='home.php'" type="submit"></button>
				 	<button class="play-sidebar" onclick="window.location.href='//wethepixies.net'" type="submit"></button>

					<!-- SIDEBAR NAVIGATION LINKS -->
					<div class="sidenav">
						<a href="about.php">About</a>
						<a href="apply.php">Apply For Staff</a>
						<a href="help.php">Help</a>
						<a href="">Talent Quiz</a>
					</div>
					<!-- END OF SIDEBAR NAVIGATION LINKS -->
				</div>
			</div>
			<!-- END OF SIDEBAR -->
		</div>

			<button class="link1" onclick="window.location.href='news.php'" type="submit">News/Events</button>
			<button class="link2" onclick="window.location.href='about.php'" type="submit">About</button>
			<button class="link3" onclick="window.location.href='contacts.php'" type="submit">Contacts</button>
			<button class="link4" onclick="window.location.href='apply.php'" type="submit">Apply For Staff</button>
			<button class="link5" onclick="window.location.href='help.php'" type="submit">Help</button>

	</div>
</body>
</html>
