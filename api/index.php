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
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="scripts/includeItems.js"></script>
	<link rel="icon" type="image/png" href="img/favicon-blue.ico"/>
	<title>We The Pixies</title>
</head>
	<body>
		<div id="page">
			<div class="container">
                                <div w3-include-html="loginButtons.php"></div>
				<img draggable="false" class="contentarea" src="img/contentarea1.png">
				<img class="titlebackground" src="img/header.png">
				<h3 class="title stroke">Pixie Hollow World</h3>
				<h4 class="subtitle">rewrite</h4>
				<img class="play-btn-content effect-shine" draggable="false" onclick="window.location.href='//wethepixies.net'" src="img/play.png">
				<div w3-include-html="nav.php"></div>
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
				<div class="bottom-nav-wrapper">
					<a href='news.php'>
						<div class="nav-button-wrapper">
							<img class="nav-img" src="img/navbutton1.png">
							<div class="nav-text">
                                                                        News & Events
                                                        </div>
							<div class="overlay">
								<div class="hover-nav-text">
									News & Events
								</div>
							</div>
						</div>
					</a>
					<a href='about.php'>
                                                <div class="nav-button-wrapper">
                                                        <img class="nav-img" src="img/navbutton2.png">
                                               		<div class="nav-text">
        	                                                About
							</div>
							<div class="overlay">
                                                                <div class="hover-nav-text">
                                                                        About WTP
                                                                </div>
                                                        </div>

						</div>
                                        </a>
					<a href='contact.php'>
                                                <div class="nav-button-wrapper">
                                                        <img class="nav-img" src="img/navbutton3.png">
                                                	<div class="nav-text">
								Contacts
							</div>
							<div class="overlay">
                                                                <div class="hover-nav-text">
                                                                        Contact Us
                                                                </div>
                                                        </div>
						</div>
                                        </a>
					<a href='apply.php'>
                                                <div class="nav-button-wrapper">
                                                        <img class="nav-img" src="img/navbutton4.png">
                                                	<div class="nav-text">
								Apply for Staff
							</div>
							<div class="overlay">
                                                                <div class="hover-nav-text">
                                                                        Apply for Staff
                                                                </div>
                                                        </div>
						</div>
                                        </a>
					<a href='faq.php'>
                                                <div class="nav-button-wrapper">
                                                        <img class="nav-img" src="img/navbutton5.png">
                                                	<div class="nav-text">
								FAQ
							</div>
							<div class="overlay">
                                                                <div class="hover-nav-text">
                                                                        FAQ
                                                                </div>
                                                        </div>
						</div>
                                        </a>
				</div>
				<img class="play-btn-content" draggable="false"  onclick="window.open('//wethepixies.net')" src="img/play.png">
			</div>
		</div>
		<script>
			includeHTML();
		</script>
	<body>
</html>
