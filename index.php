<?php include "header.php"; ?>
	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">

				<div class="main_welcome">
					<div class="inner_welcome">
						&emsp;
						&emsp;
						<img src="images/w.svg" width="60" alt="">
						<img src="images/o.svg" width="60" alt="">
						<img src="images/r.svg" width="60" alt="">
						<img src="images/d.svg" width="60" alt="">
						<img src="images/s.svg" width="60" alt="">
						<br>
						<br>
						<img src="images/l.svg" width="60" alt="">
						<img src="images/e.svg" width="60" alt="">
						<img src="images/a.svg" width="60" alt="">
						<img src="images/r.svg" width="60" alt="">
						<img src="images/n.svg" width="60" alt="">
						<img src="images/i.svg" width="60" alt="">
						<img src="images/n.svg" width="60" alt="">
						<img src="images/g.svg" width="60" alt="">
						<br>
						<br>
						<img src="images/s.svg" width="60" alt="">
						<img src="images/y.svg" width="60" alt="">
						<img src="images/s.svg" width="60" alt="">
						<img src="images/t.svg" width="60" alt="">
						<img src="images/e.svg" width="60" alt="">
						<img src="images/m.svg" width="60" alt="">
					</div>
					<h3>The site has</h3>
					<div class="main_content">
						<div class="main_content_text">
							<h4>English learning section</h4>
							<p>Learn English by learning new words, phrases, taking tests, studying grammar, <b>logging</b> in to your account, or creating a new one.</p>
						</div>
						<div class="main_content_img"><img style="margin-top: 44px;" src="images/bilingual.png" alt="" width="300px"></div>
					</div>

					<div class="main_content">
						<div class="main_content_img"><img style="margin-top: 21px;" src="images/testing.png" alt="" width="175px"></div>
						<div class="main_content_text">
							<h4>Test section</h4>
							<p>The tests will help you to strengthen your knowledge of English, <b> log in </b> to your account, or create a new one և pass the English language test.</p>
						</div>
					</div>

					<!--<div class="main_content">
						<div class="main_content_text">
							<h4>Թեստերի բաժին</h4>
							<p>Թեստերը կօգնեն ձեզ ամրապնդել անգլերենի իմացությունը, <b>մուտք գործեք</b> ձեր հաշիվը, կամ ստեղծեք նորը և անցեք անգլերեն լեզվի իմացության ստուգմանը։</p>
						</div>
						<div class="main_content_img"><img style="margin-top: 17px;" src="images/testing.png" alt="" width="175px"></div>
					</div>-->

					<div class="main_content">
						<div class="main_content_text">
							<h4>Antonym/Synonym section</h4>
							<p>Learn the synonyms։ synonyms for frequently used words in English.</p>
						</div>
						<div class="main_content_img"><img src="images/a-s.png" alt="" width="175px"></div>
					</div>

					<div class="main_content">
						<div class="main_content_img"><img style="margin-top: 17px;" src="images/dictionary.png" alt="" width="175px"></div>
						<div class="main_content_text">
							<h4>Dictionary section</h4>
							<p>Learn the explanation of frequently used words in English.</p>
						</div>
					</div>
				
				</div>
			</div>
			
		<?php include "rightContent.php" ?>		

		<?php if ( isset( $_GET["val"] )  && $_GET["val"] == "no" ){ ?>
			<input class="user_sign_in" type="hidden" value="Email or password is incorrect">
		<?php } ?>	

		<?php if ( isset( $_GET["val"] )  && $_GET["val"] == 1 ){ ?>
			<input class="email_error" type="hidden" value="This email address already exists">
		<?php } ?>

		<?php if ( isset( $_GET["val"] )  && $_GET["val"] == 2 ) { ?>
			<input class="pass_error" type="hidden" value="Passwords do not match">
		<?php } ?>

		<?php if ( isset( $_GET["val"] )  && $_GET["val"] == 3 ) { ?>
			<input class="email_error" type="hidden" value="This email address already exists">
			<input class="pass_error" type="hidden" value="Passwords do not match">
		<?php unset( $_GET["val"] ); } else { ?>
			<input class="user_sign_in" type="hidden" value="">
			<input class="email_error" type="hidden" value="">
			<input class="pass_error" type="hidden" value="">
		<?php } ?>

		</div>
	</div>

<?php include "footer.php" ?>