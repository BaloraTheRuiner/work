<?php include "header.php" ?>

	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">
				<div class="blockTitle">
					<div class="titleIcon ratingPos"><img src="images/line-chart.png" alt=""></div>
					<div class="doubleBorderStyle ratingPos">
						<div>Rating list: top 20</div>
					</div>
				</div>
				<div class="rating">
					<table>
						<tr>
							<th></th>
							<th colspan="2">Name Surname</th>
							<th>Point</th>
						</tr>
						<?php 
							$place = 0;
							foreach ( $db->ratingInfoSelect() as $key )
							{	
						?>
						<tr>
							<td><?= ++$place ?></td>
							<td colspan="2"><?= $key["name"] . " " . $key["surname"] ?></td>
							<td><?= $key["rating"] ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
			</div>
			<?php include "rightContent.php" ?>	
		</div>
	</div>

<?php include "footer.php" ?>