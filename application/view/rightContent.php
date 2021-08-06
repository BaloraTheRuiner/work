<div class="right_content">
	<div class="my_office">
		<div id="ad_title">
			<div class="my_home">
				<img src="images/user.png" alt="">
				<p>Profile</p>
			</div>
		</div>
		<div class="inner_my_office">
			<?php if ( isset( $_SESSION['photo'] ) ){ ?>
	 			<img src="<?='images/' . $_SESSION['photo'] . '.png';?>" alt="">
	 		<?php } else { ?>
	 			<img src="<?='images/0.png';?>" alt="">
	 		<?php } ?>
			<?php if ( isset( $_SESSION["id"] ) ) { ?>
				<p><a href="myoffice.php">My profile</a></p>
			<?php } else { ?>
				<p class="btn_signIn">My profile</p>
			<?php } ?>
		</div>
		<!-- <div class="inner_my_office"> -->
			<!-- <img src="images/table.png" alt=""> -->
			<?php //if ( isset( $_SESSION["id"] ) ) { ?>
				<!-- <p><a href="#.php">My English Level</a></p> -->
			<?php //} else { ?>
				<!-- <p class="btn_signIn">My English Level</p> -->
			<?php //} ?>
		<!-- </div> -->
		<div class="inner_my_office">
			<img src="images/rating.png" alt="">
			<?php if ( isset( $_SESSION["id"] ) && isset( $_SESSION["rating"] ) ) { ?>
				<p style="text-decoration: none!important;" class="rating_page"><a style="text-decoration: none!important;" href="rating.php"><span style="text-decoration: underline;">Scoreboard</span> (<?= $_SESSION["rating"] ?>)</a></p>
			<?php } else { ?>
				<p class="btn_signIn">Scoreboard</p>
			<?php } ?>
		</div>
		<div class="inner_my_office">			
			<img src="images/shop.png" alt="">
			<?php if ( isset( $_SESSION["id"] ) ) { ?>
				<p><a href="shop.php">Market</a></p>
			<?php } else { ?>
				<p class="btn_signIn">Market</p>
			<?php } ?>
		</div>
	</div>
	<div class="ad">
		<div id="ad_title">
			<div class="my_home">
				<img src="images/ad.png" alt="">
				<p>AD</p>
			</div>
		</div>
		<?php $ad = $db->adInfo(); ?>
		<a href="<?php print $ad[0]['link']; ?>" target="_blank">
			<div style="background-image: url('<?php print "images/" . $ad[0]['photo']; ?>');" class="ad_photo"></div>
		</a>
	</div>
</div>