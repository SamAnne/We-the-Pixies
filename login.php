<?php
	session_start();

	//Check if user is already logged in
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: home.php");
		exit;
	}

	//Connect to db
	require_once('config.php');

	$username = "";
	$password = "";
	$error_msg = "";

	//When form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])){
		
		// Check if username is empty
    		if(empty(trim($_POST["username"]))){
        		$error_msg = "Please enter username and password.";
		} 
		else{
        		$username = trim($_POST["username"]);
		}
		
		// Check if password is empty
		if(empty(trim($_POST["password"]))){
        		$error_msg = "Please enter username and password.";
		} 
		else{
        		$password = trim($_POST["password"]);
		}


		//Check if they're in database
		if(empty($error_msg)){
			$sql = "SELECT * FROM wtpusers WHERE username = '$username' AND password = '$password'";
			$data = mysqli_query($dbc, $sql);
			
			if(mysqli_num_rows($data) == 1){
			//Password is correct
				$result = mysqli_fetch_array($data);
				
				if($result["inactive"] == 1){
					$error_msg = "Account inactive.";
				}

				else{
					//Start user's session
					session_start();

					//Session variables to store data across pages
					$_SESSION["loggedin"] = true;
					$_SESSION["id"] = $result["id"];
					$_SESSION["username"] = $username;
					$_SESSION["usertype"] = $result["usertype"];

					header("location: home.php");
				}
			}
			else{
				$error_msg = "Username or password not correct.";
			}
		}
		mysqli_close($dbc);
	} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">

	<script type="text/javascript" src="scripts/includeItems.js"></script>

	<link rel="icon" type="image/png" href="img/favicon-blue.ico"/>
	<title>Login · We The Pixies</title>
</head>
<body>
	<div id="page">
	       <div class="container">


	<!--  LOGIN FORM  -->
		<div class="login-content-area">
                	<div class="login-form">
				<center><h2>Log In</h2></center>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($error_msg)) ? 'has-error' : ''; ?>">
					<input type="text" name="username" id="username" placeholder="Username"><br><br>

					<input type="password" name="password" id="password" placeholder="Password"><br>
					<span class="error-msg"><?php echo $error_msg; ?></span>
                                </div>
				<br>

				<input type="submit" class="submit" name="submit" value="Log In">
				</form>
			</div>
		</div>
	<!-- END OF LOGIN FORM -->

	<!-- SIDEBAR -->
		<div w3-include-html="nav.php"></div>
	<!-- END OF SIDE BAR -->
		</div>
	</div>
	<script>
                includeHTML();
        </script>
</body>
</html>
