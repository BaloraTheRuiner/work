<?php include "header.php" ?>

	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">
				<div class="shop_content">
					<?php foreach ( $db->shop() as $key ) { ?>
						<div class="shop_block">
							<div id="shop_title">
								<div class="my_home">
									<img src="images/brand-identity.png" alt="">
									<p>Product №<?=$key["product_number"];?></p>
								</div>
							</div>
							<div class="shop_info_img" style="background-image: url('<?= $key["photo"] ?>');">
								<div class="shop_info_img_op" data-link="<?= $key["photo"] ?>"></div>
							</div>
							<div class="shop_all_info">
								<div class="shop_info_p">
									<h4>Description</h4>
									<p><?php print substr($key['description'], 0, 120); ?></p>
								</div>
								<div class="shop_buy_btn"><b>Price: </b><span><?=$key["price"];?></span> point<button>Buy</button></div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php include "rightContent.php" ?>	
		</div>
	</div>

<?php include "footer.php" ?>