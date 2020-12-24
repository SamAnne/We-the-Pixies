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

	//$_SESSION["edit"] = null;
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Katibeh&family=Lobster+Two&family=Oleo+Script&family=Playball&family=Srisakdi:wght@700&display=swap" rel="stylesheet">

	<script type="text/javascript" src="scripts/includeItems.js"></script>

        <link rel="icon" type="image/png" href="img/favicon-blue.ico"/>
        <title>Contact Us · We The Pixies</title>


</head>
	<body>
		<div id="page">
			<div class="container">

				<!-- SIDEBAR -->
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
				<!-- END OF SIDEBAR -->
				
				<div class="content-wrapper">
					<h2> Contacts </h2>
					<div class="contentarea-contact-wrapper">
						<div class="contact-title">
							Contact WTP
						</div>	
						<div class="contact-subtitle">
							Check out our social media and get in touch with us.
						</div>

						<div class="contacts-wrapper">
							<a href="https://discord.gg/c23JsZf" target="_blank">
								<div class="contact-wrapper">
									<div class="icon-wrapper discord">
									<!--	<img class="icon-image" src="img/instagram-icon.png">
									-->
									</div>
									<div class="icon-subtitle">
										DISCORD
									</div>
								</div>
							</a>
							<a href="https://www.instagram.com/wethepixies/" target="_blank">
                                                                <div class="contact-wrapper">
                                                                        <div class="icon-wrapper instagram">
                                                                        </div>
                                                                        <div class="icon-subtitle">
                                                                                INSTAGRAM
                                                                        </div>
                                                                </div>
							</a>
							<a href="https://www.facebook.com/WeThePixies/" target="_blank">
                                                                <div class="contact-wrapper">
                                                                        <div class="icon-wrapper facebook">
                                                                        </div>
                                                                        <div class="icon-subtitle">
                                                                                FACEBOOK
                                                                        </div>
                                                                </div>
                                                        </a>
							<a href="https://wethepixies.tumblr.com/" target="_blank">
                                                                <div class="contact-wrapper">
                                                                        <div class="icon-wrapper tumblr">
                                                                        </div>
                                                                        <div class="icon-subtitle">
                                                                                TUMBLR
                                                                        </div>
                                                                </div>
                                                        </a>
                                                        <a href="mailto:wethepixies@gmail.com?">
                                                                <div class="contact-wrapper">
                                                                        <div class="icon-wrapper email">
                                                                        </div>
                                                                        <div class="icon-subtitle">
                                                                                EMAIL
                                                                        </div>
                                                                </div>
                                                        </a>


						</div>

					</div>
				</div>
			</div>
		</div>
		<script>
			includeHTML();
		</script>
	<body>
</html>
