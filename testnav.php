<?php
	$loggedin = "";
	$usertype = "";

	session_start();
	require_once('config.php');

	if(isset($_SESSION["loggedin"])){
		$loggedin = $_SESSION["loggedin"];
		$username = $_SESSION["username"];
		$usertype = $_SESSION["usertype"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script type="text/javascript" src="scripts/includeItems.js"></script>

	<title>We The Pixies</title>


</head>
	<body>
		<div id="page">
			<div class="container">

				<!-- Include on all pages -->
				<div w3-include-html="loginButtons.php"></div>

				<div w3-include-html="nav.php"></div>

				<!-- Changing featured fairy -->
				<?php
				        if(isset($_POST["submit"])){
				                if(!empty($_POST["link"])){
				                        $link = $_POST["link"];
				                        mysqli_query($dbc, "UPDATE wtpposts SET img_path='$link' WHERE postType='fairy'");
				                }
   				        	if(!empty($_POST["fairyName"])){
                        				$fairyName = $_POST["fairyName"];
                       	 				mysqli_query($dbc, "UPDATE wtpposts SET content='$fairyName' WHERE postType='fairy'");
                				}
        				}
				?>
				<!-- End of include on all pages -->
	

		</div>

		<script>
			includeHTML();
		</script>
	<body>
</html>
