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
<?php if($usertype == 1){ ?>
<!--                                <button class="open-button" onclick="openForm()"> </button>
-->
<?php } ?>


<!-- SIDEBAR -->
                                <img draggable="false" class="sidebar" src="img/sidebar2.png">
                                <img class="wtp-logo" title="Home" draggable="false" onclick="window.location.href='home.php'" src="img/wtp-logo.png">
                                <img class="play-btn-sidebar" draggable="false" onclick="window.open('//wethepixies.net')" src="img/play.png">

                                <!-- SIDEBAR NAVIGATION LINKS -->
                                <div class="sidenav">
                                        <a href="about.php" class="effect-shine">About</a>
                                        <a href="apply.php" class="effect-shine">Apply For Staff</a>
                                        <a href="faq.php" class="effect-shine">FAQ</a>
                                        <a href="" class="effect-shine">Talent Quiz</a>
                                </div>
                                <!-- END OF SIDEBAR NAVIGATION LINKS -->
                                <div class="bottom-sidebar">

<?php
                                        $row = mysqli_query($dbc, "SELECT * FROM wtpposts WHERE postType='fairy'");
                                        $result = mysqli_fetch_assoc($row);
                                        $img = $result["img_path"];
                                        $fairyName = $result["content"];
?>
                                        <div class="featured-fairy-wrapper">
                                                <div>
                                                <img class="fairy-img" src="<?php echo $img?>" alt="testfairy" border="0" />
                                                </div>
                                                <div class="fairy-name">
                                                        Featured Fairy: <br><?php echo $fairyName?>
                                                </div>
					</div>
					<?php if($usertype == 1){ ?>
                                <button class="open-button" onclick="openForm()"> </button>
<?php } ?>
</div>
<div class="form-popup" id="myForm">
  <form method="post" class="form-container">
    <h2 style="color:black;">Featured Fairy</h2>

    <label for="link"><b>Link to Photo</b></label>
    <input type="text" placeholder="Image Source Link" name="link">

    <label for="fairyName"><b>Name</b></label>
    <input type="text" placeholder="Featured Fairy Name" name="fairyName">

    <button type="submit" name="submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

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


				</div>

				<!-- END OF SIDEBAR -->
