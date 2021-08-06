<?php
 	include "../controller/controller.php"; 
	// Controller::url();die;	 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>English Learn</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<!-- particles.js container -->
	<div id="particles-js"></div>

	<!-- scripts -->
	<!-- <script src="js/app.js"></script> -->
	<script src="js/particles.js"></script>
	<script>
		particlesJS.load('particles-js', 'particles.json', function() {});
	</script>


	<!-- ------------------------------------------------------------------ -->
	<header>
		<div class="header">
			<div class="inner_header">
				<div class="header_menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<?php if ( isset( $_SESSION["id"] ) ) { ?>
							<li>
								<a href="englishlevel.php">Learn</a>
							</li>
						<?php } else { ?>
							<li class="test_img">
								<a href="#" title="Մուտք գործեք">
									<img width="65x" src="images/chains-test.png" alt="Մուտք գործեք"> 
									Learn
								</a>
							</li>
						<?php } ?>
						<?php if ( isset( $_SESSION["id"] ) ) { ?>
							<li>
								<!-- <a href="#" class="test_href">Թեստեր</a> -->
								<a href="tests.php">Tests</a>
							</li>
						<?php } else { ?>
							<li class="test_img">
								<a href="#" title="Մուտք գործեք">
									<img width="64px" src="images/chains-test.png" alt="Մուտք գործեք"> 
									Tests
								</a>
							</li>
						<?php } ?>
						<li><a href="hakhom.php">Antonym/Synonym</a></li>
						<li><a href="translate.php">Vocabulary</a></li>
						<?php 
							if ( !isset( $_SESSION["id"] ) ) 
							{ 
						?>
								<li class="li_btn_signIn"><button class="btn_signIn">Sign in</button><!-- <img src="images/user.png" alt="" width="18"> --></li>
						<?php } ?>
						<?php 
							if ( isset( $_SESSION["id"] ) ) 
							{
								print("<li><button class='btn_userLeave' value='" . $_SESSION["id"] . "'>Sign out</button></li>");
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</header>
<?php //if ( isset( $_SESSION["id"] ) ) print "user id = " . $_SESSION["id"]; else { unset($_SESSION["id"]); print "NO"; } ?>