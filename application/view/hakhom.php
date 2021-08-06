<?php include "header.php" ?>

	<?php 

			// word, ant, syn, page
			// $arr = [
			// 	"baby", "", ""
			// ];

			// for ($i = 0; $i < count($arr); $i = $i + 3){
			// 	$db->ddd($arr[$i], $arr[$i+1], $arr[$i+2], 1);
			// }

			
	?>

	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">

				<div class="blockTitle">
					<div class="titleIcon hakhomPos"><img src="images/sync.svg" alt=""></div>
					<div class="doubleBorderStyle hakhomPos">
						<div>Antonym/Synonym</div>
					</div>
				</div>
				<div class="hakhom">
					<div class="inner_hakhom hakhom_rot_1">
						
						<div class="hakhom_title hak_title">
							<h2 style="text-decoration: underline; color: #5d547d;">Antonyms</h2>
						</div>

						<div class="hakhom_content ant_content">
							<p><b>Abate</b> - Aggravate</p>
							<p><b>Adhere</b> - Condemn, disjoin</p>
							<p><b>Abolish</b> - Setup, establish</p> 
							<p><b>Acumen</b> - Stupidity, ignorance</p>  
							<p><b>Abash</b> - Uphold, Discompose</p>
							<p><b>Absolve</b> - Compel, Accuse</p>
							<p><b>Abjure</b> - Approve, Sanction</p>
							<p><b>Abject</b> - Commendable, Praiseworthy</p>
							<p><b>Abound</b> - Deficient, Destitute</p>
							<p><b>Abortive</b> - Productive</p>
							<p><b>Acrimony</b> - Courtesy, Benevolence</p>
							<p><b>Accord</b> - Discord</p>
							<p><b>Adjunct</b> - Separated, Subtracted</p>
							<p><b>Adversity</b> - Prosperity, Fortune</p>
							<p><b>Adherent</b> - Rival, Adversary</p>
							<p><b>Adamant</b> - Flexible, Soft</p>
							<p><b>Admonish</b> - Approve, Applaud</p>
							<p><b>Allay</b> - Aggravate, Excite</p>
							<p><b>Alien</b> - Native, Resident</p>
							<p><b>Ascend</b> - Descend, Decline</p>
							<p><b>Alleviate</b> - Aggravate, Enhance</p>
							<p><b>Allure</b> - Repulse, Repel</p>
							<p><b>Arraign</b> - Exculpate, Pardon</p>
							<p><b>Amplify</b> - Lessen, Contract</p>
							<p><b>Axiom</b> - Absurdity, Blunder</p>
							<p><b>Audacity</b> - Mildness, Cowardice</p>
							<p><b>Authentic</b> - Fictitious, unreal</p>
							<p><b>Awkward</b> - Adroit, clever</p>
							<p><b>Barbarous</b> - Civilized</p>
							<p><b>Bleak</b> - Bright, Pleasant</p>
						</div>

						

						<div class="hakhom_page">
							<?php 
								foreach ( $db->hakhomPageChange() as $key ) 
								{ 
							?>
								<button class="ant_page" data-type="ant" value="<?= $key["page"]; ?>"><?= $key["page"]; ?></button>
							<?php } ?>
						</div>
						
					</div>
					<div class="inner_hakhom hakhom_rot_2">
						
						<div class="hakhom_title hom_title">
							<h2 style="text-decoration: underline; color: #5d547d;">Synonyms</h2>
						</div>

						<div class="hakhom_content syn_content">
							<p><b>Abate</b> - Moderate, decrease</p>
							<p><b>Adhere</b> - Comply, observe</p>
							<p><b>Abolish</b> -	Abrogate, annul</p>
							<p><b>Acumen</b> - Awareness, brilliance</p>
							<p><b>Abash</b> - Disconcert, rattle</p>
							<p><b>Absolve</b> -	Pardon, forgive</p>
							<p><b>Abjure</b> - Forsake, renounce</p>
							<p><b>Abject</b> - Despicable, servile</p>
							<p><b>Abound</b> - Flourish, proliferate</p>
							<p><b>Abortive</b> - Vain, unproductive</p>
							<p><b>Acrimony</b> - Harshness, bitterness</p>
							<p><b>Accord</b> - Agreement, harmony</p>
							<p><b>Adjunct</b> - Joined, Added</p>
							<p><b>Adversity</b> - Misfortune, calamity</p>
							<p><b>Adherent</b> - Follower, disciple</p>
							<p><b>Adamant</b> - Stubborn, inflexible</p>
							<p><b>Admonish</b> - Counsel, reprove</p>
							<p><b>Allay</b> - Pacify, soothe</p>
							<p><b>Alien</b> - Foreigner, outsider</p>
							<p><b>Ascend</b> - Climb Escalate</p>	
							<p><b>Alleviate</b> - Abate, relieve</p>
							<p><b>Allure</b> - Entice, fascinate</p>
							<p><b>Arraign</b> - Incriminate, indict</p>
							<p><b>Amplify</b> - Augment, deepen</p>
							<p><b>Axiom</b> - Adage, truism</p>
							<p><b>Audacity</b> - Boldness, Courage</p>
							<p><b>Authentic</b> - Accurate, credible</p>
							<p><b>Awkward</b> -	Rude, blundering</p>
							<p><b>Barbarous</b> - Frustrate, perplex</p>
							<p><b>Bleak</b> - Grim, Austere</p>
						</div>

						<div class="hakhom_page">
							<?php 
								foreach ( $db->hakhomPageChange() as $key ) 
								{ 
							?>
								<button class="ant_page" data-type="syn" value="<?= $key["page"]; ?>"><?= $key["page"]; ?></button>
							<?php } ?>
						</div>
						
					</div>
				</div>

			</div>
		<?php include "rightContent.php" ?>		
		</div>
	</div>

<?php include "footer.php" ?>