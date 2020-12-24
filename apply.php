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
	<script type="text/javascript" src="scripts/includeItems.js"></script>

        <link rel="icon" type="image/png" href="img/favicon-blue.ico"/>
        <title>News & Events · We The Pixies</title>


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
					<img class="titlebackground" src="img/header.png" style="left: 45%; top: 2%;">
				<div class="content-wrapper">
					<h2> Apply for Staff </h2>
					<div class="contentarea-wrapper">
<?php
					if(isset($_SESSION["edit"])){
						        if($usertype == 1  && $_SESSION["edit"] != 1){
?>
							<form method="post">
								<input class="edit-icon" type="submit" value="" title="Edit"  name="editButton">
<?php
								if(isset($_POST["editButton"])){
									$_SESSION["edit"] = 1;
									header("refresh:1; url=about.php");
								} 
							}
					}
					if(!isset($_SESSION["edit"]) && $usertype == 1){ ?>
						<form method="post">
                                                                 <input class="edit-icon" type="submit" value="" title="Edit"  name="editButton">
  <?php
                                                                  if(isset($_POST["editButton"])){
                                                                          $_SESSION["edit"] = 1;
                                                                          header("refresh:1; url=about.php");
                                                                  }
	
					}

?>
								</form>

						<div class="about-text">
<?php 
	$row = mysqli_query($dbc, "SELECT * FROM wtpposts WHERE postType='about'");
	$result = mysqli_fetch_assoc($row);
	$about = $result["content"];
?>
					<div class="edit-form">
<?php
					if(isset($_SESSION["edit"]) && $_SESSION["edit"] == 1 && $usertype == 1){?>
							<form method="post">
								<textarea name="editAbout" id="editAbout" style="margin-top:30px;" rows="20" cols="90"><?php echo $about?></textarea>
								<br>
								<br>
								<input type="submit" class="submit" value="Save" name="save">
<?php
						if(isset($_POST["save"])){
								  $newAbout = mysqli_real_escape_string($dbc, $_POST["editAbout"]);
								  mysqli_query($dbc, "UPDATE wtpposts SET content='$newAbout' WHERE postType='about'");
								$_SESSION["edit"] = 0;
								//header("refresh:1; url=about.php");

								$URL="about.php";
								echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
								echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
							  }?>
							</form>

<?php   }
else{
?>

					</div>	
						<br>
						<div class="about-text-content">
							<p> <?php echo $about?> </p>
						</div>
<?php } ?>
					</div>	
				</div>
			</div>
		</div>
		<script>
			includeHTML();
		</script>
	<body>
</html>
