<?php include "header.php"; ?>

	<?php 


			// $arr = [
				
			// ];

			// for ($i = 0; $i < count($arr); $i = $i + 2){
			// 	$db->aaa("Z", $arr[$i], $arr[$i+1]);
			// }


	?>


	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">
				<div class="blockTitle">
					<div class="titleIcon translatePos"><img src="images/dictionary.svg" alt=""></div>
					<div class="doubleBorderStyle translatePos">
						<div>Vocabulary</div>
					</div>
					<div class="search_word">
						<input class="search_input" type="text" placeholder="Search word">
					</div>
				</div>
				<div class="translate">

					<table>
						<tr>
							<th>A</th>
							<th>Most popular words</th>
						</tr>
						<?php 
							$count = 0;
							foreach ( $db->checkTranslatePage("A") as $key ) 
							{ 
						?>
							<tr>
								<td><p class="word_td"><?= $key["word"]; ?></p></td>
								<td><p><?= $key["word_info"]; ?></p></td>
							</tr>
						<?php } ?>
					</table>
						
				</div>

				<div class="word_change">

					<div class="translate_words">
						<h4 style="color: #5d547d;">
							<span class="translate_page" data-type="A">Aa</span>
							<span class="translate_page" data-type="B">Bb</span>
							<span class="translate_page" data-type="C">Cc</span>
							<span class="translate_page" data-type="D">Dd</span>
							<span class="translate_page" data-type="E">Ee</span>
							<span class="translate_page" data-type="F">Ff</span>
							<span class="translate_page" data-type="G">Gg</span>
							<span class="translate_page" data-type="H">Hh</span>
							<span class="translate_page" data-type="I">Ii</span>
							<span class="translate_page" data-type="J">Jj</span>
							<span class="translate_page" data-type="K">Kk</span>
							<span class="translate_page" data-type="L">Ll</span>
							<span class="translate_page" data-type="M">Mm</span>
							<span class="translate_page" data-type="N">Nn</span>
							<span class="translate_page" data-type="O">Oo</span>
							<span class="translate_page" data-type="P">Pp</span>
							<span class="translate_page" data-type="Q">Qq</span>
							<span class="translate_page" data-type="R">Rr</span>
							<span class="translate_page" data-type="S">Ss</span>
							<span class="translate_page" data-type="T">Tt</span>
							<span class="translate_page" data-type="U">Uu</span>
							<span class="translate_page" data-type="V">Vv</span>
							<span class="translate_page" data-type="W">Ww</span>
							<span class="translate_page" data-type="X">Xx</span>
							<span class="translate_page" data-type="Y">Yy</span>
							<span class="translate_page" data-type="Z">Zz</span>
						</h4>
					</div>
					
				</div>
			</div>

<?php include "rightContent.php" ?>		
		</div>
	</div>

<?php include "footer.php"; ?>