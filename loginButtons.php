
<?php
	$loggedin = "";

	session_start();
	require_once('config.php');

	if(isset($_SESSION["loggedin"])){
		$loggedin = $_SESSION["loggedin"];
		$username = $_SESSION["username"];
	}
?>

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
