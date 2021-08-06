<?php include "header.php" ?>

	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">
				<div class="myoffice">
					<div class="user_photo">
						<?php if ( isset( $_SESSION['photo'] ) ){ ?>
				 			<img src="<?='images/' . $_SESSION['photo'] . '.png';?>" alt="">
				 		<?php } else { ?>
				 			<img src="<?='images/' . $_SESSION['photo'] . '.png';?>" alt="">
				 		<?php } ?>
				 		<div><button class="edit_user_photo" value="<?=$_SESSION['photo']?>">Edit photo</button></div>
					</div>
					<div class="user_info_block">
						<div class="user_info user_info_1">
							<p><b>Name:</b> <?= $_SESSION["name"];?></p>
							<input class="user_info_edit_input" type="text" hidden value="<?= $_SESSION["name"];?>">
							<div class="user_btn user_btn_info_edit" data-id="1"><b>Edit</b></div>
						</div>
						<div class="user_info user_info_2">
							<p><b>Surname:</b> <?= $_SESSION["surname"];?></p>
							<input class="user_info_edit_input" type="text" hidden value="<?= $_SESSION["surname"];?>">
							<div class="user_btn user_btn_info_edit" data-id="2"><b>Edit</b></div>
						</div>
						<div class="user_info user_info_3">
							<p><b>Email:</b> <?= $_SESSION["email"];?></p>
							<input class="user_info_edit_input" type="email" hidden value="<?= $_SESSION["email"];?>">
							<div class="user_btn user_btn_info_edit" data-id="3"><b>Edit</b></div>
						</div>
						<div class="user_info user_info_4">
							<p><b>Password:</b> <?= $_SESSION["password"];?></p>
							<input class="user_info_edit_input" type="password" hidden value="<?= $_SESSION["password"];?>">
							<div class="user_btn user_btn_info_edit" data-id="4"><b>Edit</b></div>
						</div>
						<input id="user_id" type="text" hidden value="<?= $_SESSION["id"];?>">
					</div>
				</div>
			</div>
			<?php include "rightContent.php" ?>	
		</div>
	</div>

<?php include "footer.php" ?>