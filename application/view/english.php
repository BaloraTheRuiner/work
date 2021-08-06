<?php include "header.php"; ?>
	<div class="middle_content">
		<div class="inner_middle_content">
			<div class="left_content">

			<?php 
				if ( isset( $_SESSION["eng_type"] ) )
				{
					$eng_type = $_SESSION["eng_type"];
					$word 	  = [];
					$phrase   = [];
					$sentence = [];
					$text 	  = [];

					foreach ( $db->chooseEnglishLevel($eng_type) as $key )
					{
						if ($key["word"] != "")
						{
							array_push($word, $key["word"]);
						}
						if ($key["sentence"] != "")
						{
							array_push($sentence, $key["sentence"]);
						}
						if ($key["text"] != "")
						{
							array_push($text, $key["text"]);
						}
					}
						$key_word 		= array_rand($word);
						$key_sentence 	= array_rand($sentence);
						$key_text 		= array_rand($text);
						
						$value_word 	= $word[$key_word];
						$value_sentence = $sentence[$key_sentence];
						$value_text 	= $text[$key_text];
			?>



				<div class="english">
					<h3>Words</h3>
					<div><p class="word"><?= $value_word; ?></p></div>
					<div class="random"><button value="word">Random word</button></div>
					<h3>Sentences</h3>
					<div><p class="sentence"><?= $value_sentence; ?></p></div>
					<div class="random"><button value="sentence">Random sentence</button></div>
					<h3>Texts</h3>
					<div><p class="text"><?= $value_text; ?></p></div>
					<div class="random"><button value="text">Random text</button></div>
				</div>

				
			<?php }  ?>

			</div>
		<?php include "rightContent.php" ?>			
		</div>
	</div>

<?php include "footer.php" ?>