<?php 
	include "../controller/controller.php";
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../view/css/style.css">
</head>
<body>

	<!-- particles.js container -->
	<div id="particles-js"></div>

	<!-- scripts -->
	<!-- <script src="js/app.js"></script> -->
	<script src="../view/js/particles.js"></script>
	<script>
		particlesJS.load('particles-js', '../view/particles.json', function() {});
	</script>
	
	<header>
		<div class="admin_header">
			<div class="inner_admin_header">

				<h3>Admin Panel</h3><br>

				<select class="form-control table_name" id="database">
					<option selected disabled>Select</option>
					<?php foreach ($db->showTablesName() as $key){ ?>
						<?php if ($key[0] == "a1") print("<option>A1 level</option>"); ?>		
						<?php if ($key[0] == "a2") print("<option>A2 level</option>"); ?>		
						<?php if ($key[0] == "ad") print("<option>AD</option>"); ?>		
						<?php if ($key[0] == "ant_syn") print("<option>Antonym/Synonym</option>"); ?>		
						<?php if ($key[0] == "b1") print("<option>B1 level</option>"); ?>		
						<?php if ($key[0] == "b2") print("<option>B2 level</option>"); ?>		
						<?php if ($key[0] == "c1") print("<option>C1 level</option>"); ?>		
						<?php if ($key[0] == "c2") print("<option>C2 level</option>"); ?>		
						<?php if ($key[0] == "shop") print("<option>Shop</option>"); ?>		
						<?php if ($key[0] == "test_question") print("<option>Test</option>"); ?>		
						<?php if ($key[0] == "tests") print("<option>User test info</option>"); ?>		
						<?php if ($key[0] == "translate") print("<option>Vocabulary</option>"); ?>		
						<?php if ($key[0] == "users") print("<option>Users</option>"); ?>		
					<?php  } ?>
				</select><br class="br">

			</div>
		</div>
	</header>

	<div class="alert col-12">

		<div class="div_for_table table-responsive">
			
		</div>
		<div class="div_for_message" style="display: none;"></div>

	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="js/admin.script.js"></script>
</body>
</html>