$(document).ready(function()
{

	$(".test_img").click(function()
	{
		alert("Log in to open");
	})

	$(".btn_signIn").click(function()
	{
		
		$("body").prepend("<div class='signInBG'></div>");
		$("body").css({
			"overflow" : "hidden"
		})
		$("body").prepend("<div class='signIn'></div>");

		$(".signIn").prepend('<div class="sign_in_title"><div class="signin">Sign in</div><div class="register">Register</div></div');

		$(".signIn").prepend('<div class="close_sign_in"></div>')

		$(".close_sign_in").click(function()
		{
			$(".signIn").empty();
			$(".signIn").remove();
			$(".signInBG").remove();
			$("body").css({
				"overflow" : "scroll"
			})
		})

		$(".signIn").append("<form></form>");

		$(".signIn form").attr("action", "../controller/controller.php");
		$(".signIn form").attr("method", "POST");

		$(".signIn form").append('<div class="div_user_sign_in"><label class="print_user_sign_in">E-mail:</label><br><br><input class="sign_in_email_check" name="email" required type="email" placeholder="E-mail"></div>');
		$(".signIn form").append('<div class="div_user_pass_error"><label class="print_user_pass_error">Password։</label><br><br><input minlength="10" class="sign_in_pass_check" required type="password" placeholder="Password" name="password"></div><br><hr>');
		$(".signIn form").append('<input type="hidden" name="action" value="signIn">');
		$(".signIn form").append('<div class="send_sign_in"><button>Sign in</button></div>');

		let user_sign_in = $(".user_sign_in").val();

		if ( user_sign_in == "Email or password is incorrect" )
		{
			$(".print_user_sign_in").html("E-mail: <span style='color:red;'>" + user_sign_in + "</span>");
			$(".sign_in_email_check").remove();
			$(".div_user_sign_in").append('<input style="border: 2px dashed red!important" class="sign_in_email_check" required type="email" name="email" placeholder="E-mail">');
			$(".print_user_pass_error").html("Password: <span style='color:red;'>" + user_sign_in + "</span>");
			$(".sign_in_pass_check").remove();
			$(".div_user_pass_error").append('<input style="border: 2px dashed red!important" class="sign_in_pass_check" minlength="10" required type="password" name="password" placeholder="Password">');
		}

		$(".register").click(function()
		{

			$(".signIn form").empty();

			$(".signIn form").append('<div><label>Name:</label><br><br><input required type="text" name="name" placeholder="Name"></div>');
			$(".signIn form").append('<div><label>Surname:</label><br><br><input required type="text" name="surname" placeholder="Surname"></div>');
			$(".signIn form").append('<div class="div_email_error"><label class="print_email_error">E-mail:</label><br><br><input class="email_check" required type="email" name="email" placeholder="E-mail"></div>');
			$(".signIn form").append('<div class="div_pass_error_1"><label class="print_pass_error_1">Password:</label><br><br><input class="check_pass_1" minlength="10" required type="password" name="password" placeholder="Password"></div>');
			$(".signIn form").append('<div class="div_pass_error_2"><label class="print_pass_error_2">Repeat password:</label><br><br><input class="check_pass_2" minlength="10" required type="password" name="repassword" placeholder="Repeat password"></div><br><hr>');
			$(".signIn form").append('<input type="hidden" name="action" value="register">');
			$(".signIn form").append('<div class="send_register"><button>Register</button></div>');

			$(".signIn").css("height", "650px");

			let 
				email_error = $(".email_error").val(),
				pass_error = $(".pass_error").val();

			if ( email_error == "This email address already exists" )
			{
				$(".print_email_error").html("E-mail: <span style='color:red;'>" + email_error + "</span>");
				$(".email_check").remove();
				$(".div_email_error").append('<input style="border: 2px dashed red!important" class="email_check" required type="email" name="email" placeholder="E-mail">');
			}

			if ( pass_error == "Passwords do not match" )
			{
				$(".print_pass_error_1").html("Password: <span style='color:red;'>" + pass_error + "</span>");
				$(".print_pass_error_2").html("Repeat password: <span style='color:red;'>" + pass_error + "</span>");
				$(".check_pass_1").remove();
				$(".check_pass_2").remove();
				$(".div_pass_error_1").append('<input style="border: 2px dashed red!important" class="check_pass_1" minlength="10" required type="password" name="password" placeholder="Password">');
				$(".div_pass_error_2").append('<input style="border: 2px dashed red!important" class="check_pass_2" minlength="10" required type="password" name="repassword" placeholder="Repeat password">');
			}

			if ( email_error == "This email address already exists" && pass_error == "Passwords do not match" )
			{
				$(".print_email_error").html("E-mail: <span style='color:red;'>" + email_error + "</span>");
				$(".email_check").remove();
				$(".div_email_error").append('<input style="border: 2px dashed red!important" class="email_check" required type="email" name="email" placeholder="E-mail">');

				$(".print_pass_error_1").html("Password: <span style='color:red;'>" + pass_error + "</span>");
				$(".print_pass_error_2").html("Repeat password: <span style='color:red;'>" + pass_error + "</span>");
				$(".check_pass_1").remove();
				$(".check_pass_2").remove();
				$(".div_pass_error_1").append('<input style="border: 2px dashed red!important" class="check_pass_1" minlength="10" required type="password" name="password" placeholder="Password">');
				$(".div_pass_error_2").append('<input style="border: 2px dashed red!important" class="check_pass_2" minlength="10" required type="password" name="repassword" placeholder="Repeat password">');
			}

		})

		$(".signin").click(function()
		{

			$(".signIn form").empty();

			$(".signIn form").append('<div class="div_user_sign_in"><label class="print_user_sign_in">E-mail:</label><br><br><input class="sign_in_email_check" name="email" required type="email" placeholder="E-mail"></div>');
			$(".signIn form").append('<div class="div_user_pass_error"><label class="print_user_pass_error">Password։</label><br><br><input minlength="10" class="sign_in_pass_check" required type="password" placeholder="Password" name="password"></div><br><hr>');
			$(".signIn form").append('<input type="hidden" name="action" value="signIn">');
			$(".signIn form").append('<div class="send_sign_in"><button>Sign in</button></div>');

			$(".signIn").css("height", "378px");

		})

	})

	$(".btn_userLeave").click(function()
	{

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "userLeave"},
			success: function(r){
				
				$(".header_menu li:last-child").remove();
				location.href = "index.php";

			}
		})

	})
	
	$(".user_btn").click(function()
	{
		let data_id = $(this).attr("data-id");
		$(".user_info_" + data_id + " p").empty();
		$(".user_info_" +  data_id + " input").attr("hidden", false);
		$(this).css({
			"pointer-events" : "none"
		});
		$(".user_info_" + data_id).append('<div class="user_btn user_btn_info_save" data-id="' + data_id + '"><b>Save</b></div>');
		$(".user_info_" +  data_id + " div").css({
			"top" : "14px"
		})

		$(".user_btn_info_save").click(function()
		{
			let data_id = $(this).attr("data-id");
			let user_id = $("#user_id").val();
			let info 	= $(".user_info_" +  data_id + " input").val();

			$.ajax({
				url: "../controller/controller.php",
				type: "post",
				data: {action: "user_info_save", user_id: user_id, field_id: data_id, user_info: info},
				success: function(r){

					r = JSON.parse(r);

					$(".user_info_" + data_id + " p").empty();
					$(".user_info_" + data_id + " input").attr("hidden", true);

					if ( data_id == 1 )
					{
						$(".user_info_" + data_id + " p").html("<b>Name:</b> " + r[0]["name"]);					
					} else if ( data_id == 2 )
					{
						$(".user_info_" + data_id + " p").html("<b>Surname։</b> " + r[0]["surname"]);
					} else if ( data_id == 3 )
					{
						$(".user_info_" + data_id + " p").html("<b>Էլ․ հասցե:</b> " + r[0]["email"]);
					} else if ( data_id == 4 )
					{
						$(".user_info_" + data_id + " p").html("<b>Password։</b> " + r[0]["password"]);
					}

					$(".user_info_" +  data_id + " div").css({
						"top" : "5px"
					})

					$(".user_info_" + data_id + " .user_btn_info_save").remove();

					$(".user_info_" +  data_id + " div").css({
						"pointer-events" : "auto"
					})

				}
			})
		})

	})

	$(".shop_info_img_op").click(function()
	{
		let link = $(this).attr("data-link");

		$("body").prepend("<div class='product_img'></div>");
		$("body").prepend("<div class='product_full_img' style='background-image: url(" + link + ")'></div>");
		$(".product_full_img").prepend('<div class="close_full_photo"></div>')
		$("body").css("overflow",  "hidden");

		$(".close_full_photo").click(function()
		{
			$(".product_full_img").empty();
			$(".product_full_img").remove();
			$(".product_img").remove();
			$("body").css({
				"overflow" : "scroll"
			})
		})

	})

	$(".static_test").click(function()
	{
		let 
			id,
			answer		 = "",
			count 		 = 0,
			question_num = 0,
			test_id		 = $(this).attr("data-test-id"),
			type 		 = $(this).attr("data-type"),
		 	level		 = $(this).attr("data-level"),
		 	sum		 	 = $(this).attr("data-sum"),
			user_id		 = $(".user_id_for_test").val();
		
		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "testLevel", test_id: test_id, type: type, level: level, user_id: user_id},
			success: function(r){

				r = JSON.parse(r);
console.log(r)
				$("body").prepend("<div class='test_level'></div>");
				$("body").prepend("<div class='test_level_question'></div>");

				$(".test_level_question").prepend('<div class="close_full_photo close_test"></div>')
				$("body").css("overflow",  "hidden");

				$(".close_full_photo").click(function()
				{
					$(".test_level_question").empty();
					$(".test_level_question").remove();
					$(".test_level").remove();
					$("body").css({
						"overflow" : "scroll"
					})
				})

				$(".close_test").click(function()
				{
					location.reload();
				})

				$(".test_level_question").prepend("<div class='question_block'><h3>Translate the word</h3><progress value='0' max='" + r.length + "'></progress><h3 class='word_trans'>" + r[question_num]["question"] + "</h3><div class='div_answer_input'><input class='answer_input' placeholder='Write the word' data-id='" + question_num + "' type='text'></div></div>");	
				$(".test_level_question").append("<button class='check_answer'>Check</button>");
				$(".test_level_question").append("<button class='next_question' disabled>Next</button>");
				
				$(".next_question").css({
					"background": "gray"
				})

				$(".check_answer").click(function()
				{
					answer = $(".answer_input").val();

					$.ajax({
						url: "../controller/controller.php",
						type: "post",
						data: {action: "checkAnswer", answer: answer, test_id: test_id, level: level, type: type, sum: sum},
						success: function(r){
							
							r = JSON.parse(r);
console.log(r);
							$(".next_question").removeAttr("disabled");
							$(".check_answer").attr("disabled", "disabled");

							$(".check_answer").css({
								"background": "gray"
							})

							$(".next_question").css({
								"background": "#5d547d"
							})

							if ( r.length == [] )
							{
								$(".question_block").empty().append("<img width='150px' src='images/ngiphy.gif'>");
							} 
							else 
							{
								$(".question_block").empty().append("<img width='150px' src='images/ygiphy.gif'>");
							}
						}
					})
				})

				$(".next_question").click(function()
				{
					question_num += 1;

					$(".question_block").empty();

					$(".check_answer").css({
						"background": "#5d547d"
					})
					$(".next_question").css({
						"background": "gray"
					})

					if ( question_num == r.length - 1 )
					{
						$(".next_question").html("Finish");
						$(".question_block").prepend("<h3>Translate the word</h3><progress value='" + question_num + "' max='" + r.length + "'></progress><h3 class='word_trans'>" + r[question_num]["question"] + "</h3><div class='div_answer_input'><input class='answer_input' placeholder='Write the word' data-id='" + question_num + "' type='text'></div>");
						$(".next_question").attr("disabled", "disabled"); 
						$(".check_answer").removeAttr("disabled");
					}
					else if ( question_num == r.length )
					{
						$(".next_question").remove();
						$(".check_answer").remove();
						$(".test_level_question").remove();
						$(".test_level").remove();
						location.reload();
					}
					else
					{
						$(".question_block").prepend("<h3>Translate the word</h3><progress value='" + question_num + "' max='" + r.length + "'></progress><h3 class='word_trans'>" + r[question_num]["question"] + "</h3><div class='div_answer_input'><input class='answer_input' placeholder='Write the word' data-id='" + question_num + "' type='text'></div>");
						$(".next_question").attr("disabled", "disabled"); 
						$(".check_answer").removeAttr("disabled");
					}

				})

			}
		})
	})

	$(".ant_page").click(function()
	{
		let 
			ant_syn = $(this).attr("data-type"),
		 	page 	= $(this).val();

		$("." + ant_syn + "_content").empty();

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "antPageChange", page: page, ant_syn: ant_syn},
			success: function(r){

				r = JSON.parse(r);

				for ( let i = 0; i < r.length; i++ )
				{
					$("." + ant_syn + "_content").append("<p><b>" + r[i]["word"] + "</b> - " + r[i]["" + ant_syn +""] + "</p>");
				}
			} 
		})
	})

	$(".translate_page").click(function()
	{
		let page = $(this).attr("data-type");

		$(".translate").empty();

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "translatePageChange", page: page},
			success: function(r){

				r = JSON.parse(r);

				$(".translate").append("<table><tr><th>" + page + "</th><th>Most popular words</th></tr>");

				for ( let i = 0; i < r.length; i++ )
				{
					$(".translate").append("<tr><td><p class='word_td'>" + r[i]["word"] + "</p></td><td><p>" + r[i]["word_info"] + "</p></td></tr>");
				}
			} 
		})
	})

	$(".edit_user_photo").click(function()
	{
		let val = $(this).val();

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "changeUserPhoto", val: val},
			success: function(r){
				location.reload();
			}
		})
	})

	$(".gotoEnglish").click(function()
	{
		let type = $(this).attr("data-type");

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "chooseLevel", type: type},
			success: function(r){
				location.href = "english.php";		
			}
		})
	})

	$(".random button").click(function()
	{
		let 
			arr = [];
			val = $(this).val();

		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "chooseType", val: val},
			success: function(r){
			
				r = JSON.parse(r)

				for ( let i = 0; i < r.length; i++ )
				{
					if (r[i][val] != "")
					{
						arr.push(r[i][val]);
					}
				}
				let item = arr[Math.floor(Math.random() * arr.length)];

				$("." + val).empty();
				$("." + val).append(item);

			}
		})
	})

	$(".search_input").on("input", function(){

		let 
			char, 
			data = $(this).val();

		$(".word_td").each(function()
		{
			char = $(this).html();
		
			if ( char.indexOf(data) >= 0 )
			{
				$(this).css({
					"background-color": "yellow"
				})
				if (data == "")
				{
					$(this).css({
						"background-color": "#b1acc6"
					})
				}
			}
			else 
			{
				$(this).css({
					"background-color": "#b1acc6"
				})
			}
			
		})

	})	

	$(".gotoEnglish").hover(function()
	{
		let type = $(this).attr("data-type");
		$(this).removeAttr("src");
		$(this).attr("src", "images/level-" + type + "-white.png");

	}, function()
	{
		let type = $(this).attr("data-type");
		$(this).removeAttr("src");
		$(this).attr("src", "images/level-" + type + ".png");
	})

})