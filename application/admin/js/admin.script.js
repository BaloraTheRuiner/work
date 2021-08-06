var nowlang = $("#nowlang").val();
var global_tb_name;				

$(document).on("change", ".table_name", function(){

	var selTabVal = $(this).val();

	if ( selTabVal == "A1 level" ) { selTabVal = "a1"; }
	if ( selTabVal == "A2 level" ) { selTabVal = "a2"; }
	if ( selTabVal == "AD" ) { selTabVal = "ad"; }
	if ( selTabVal == "Antonym/Synonym" ) { selTabVal = "ant_syn"; }
	if ( selTabVal == "B1 level" ) { selTabVal = "b1"; }
	if ( selTabVal == "B2 level" ) { selTabVal = "b2"; }
	if ( selTabVal == "C1 level" ) { selTabVal = "c1"; }
	if ( selTabVal == "C2 level" ) { selTabVal = "c2"; }
	if ( selTabVal == "Shop" ) { selTabVal = "shop"; }
	if ( selTabVal == "Test" ) { selTabVal = "test_question"; }
	if ( selTabVal == "User test info" ) { selTabVal = "tests"; }
	if ( selTabVal == "Vocabulary" ) { selTabVal = "translate"; }
	if ( selTabVal == "Users" ) { selTabVal = "users"; }

	global_tb_name = selTabVal;

	var selDbVal = $("#database").val();

	$(".form-edit").remove();

	$(".table_message").empty();

	$(".form_photo_upload").remove();
	
	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "showFields", table_name: selTabVal},
		success: function(r){
				if (r){

					r = JSON.parse(r);
					
				}
		}
	})

	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "showTables", table_name: selTabVal, db_name: selDbVal},
		success: function(r){
			if (r){
				
				$(".add").remove();

				$(".div_for_table").empty();

				r = JSON.parse(r);

				// var div = $("<div class='main_block'></div>");

				// var block = $("<div class='block'></div>");

				// $(".block").append();

				var table = $("<br><table class='table_inf table table-hover'></table>");
				
				var thead = $("<thead></thead>");

				var tbody = $("<tbody class='table_tbody'></tbody>");

				var mainTr = $("<tr></tr>");

				var image = [];

				Object.keys(r[0]).forEach(function(item){

					var td = $("<th>" + item + "</th>");

					thead.append(mainTr.append(td));

					image.push(item);

				})

				table.append(thead);

				r.forEach(function(item){

					var tr = $("<tr class='table-primary'></tr>");

					var val = Object.values(item);

					for (i = 0; i < val.length; i++){

						if (image[i] == "photo" && selTabVal == "users"){

							tr.append("<td><image width='150' heigth='150' src='../view/images/" + val[i] + ".png'></td>");

						}
						else if (image[i] == "photo" && selTabVal == "ad"){

							
							tr.append("<td><image width='150' heigth='150' src='../view/images/" + val[i] + "'></td>");
							
						}
						else if (image[i] == "photo"){

							tr.append("<td><image width='150' heigth='150' src='" + val[i] + "'></td>");
							
						}
						else {

							if (val[i].length > 60) {

								val[i] = val[i].substring(0, 60);

								val[i] += "...";

							}

							tr.append("<td>" + val[i] + "</td>");

						}

					}

					tbody.append(tr);
						
					tr.append("<td><button data-id='" + item.id + "' class='delete btn btn-primary'>Delete</button></td>");

					tr.append("<td><button data-id='" + item.id + "' class='edit btn btn-success'>Edit</button></td>");

					for (var i = 0; i < image.length; i++) {

						if (image[i] == "image" || image[i] == "photo_am" || image[i] == "photo_ru" || image[i] == "photo_eng"){

							tr.append("<td><button data-id='" + item.id + "' class='edit_photo btn btn-dark'>Edit photo</button></td>");
							
						}

					}

				})

				table.append(tbody);

				$(".div_for_table").append(table);
					
				$(".br").after("<button class='btn add' data-type='" + selTabVal + "'>Add</button>");
			
			}
		}
	})

})

$(document).on("click", ".delete", function(){

	var agree = prompt("Click OK if you agree", "OK");

	if (agree == "OK"){
	
		var id = $(this).attr("data-id");

		var tb_name = global_tb_name;

		var selDbVal = $("#database").val();
		
		$.ajax({
			url: "../controller/controller.php",
			type: "post",
			data: {action: "deletes", del_id: id, db_name: selDbVal, tb_name: tb_name},
			success: function(r){
				location.reload();
			}
		})

	}

})

var keys, value, global_edit_id;

$(document).on("click", ".edit", function(){

	var id = $(this).attr("data-id");

	$(".table_inf").empty();

	global_edit_id = id;

	var tb_name = global_tb_name;

	var selDbVal = $("#database").val();
	console.log(tb_name)
	console.log(id)
	console.log(selDbVal)
	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "edit", edit_id: id, db_name: selDbVal, tb_name: tb_name},
		success: function(r){

			r = JSON.parse(r);

			$(".form-edit").remove();

			$(".add").remove();

			$(".div_for_table").css({
				"overflow-x": "visible"
			})

			var formDiv = $("<div class='container form-edit'></div>")

			var form = $("<form method='post' action='../controller/controller.php' id='form'></form>");

			form.append($("<h2>Form for editing</h2>"));

			r.forEach(function(item){

				keys = Object.keys(item);

				value = Object.values(item);

				var br_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='br btn'>br</button>");
				var b_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='b btn'>B</button>");
				var i_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='i btn'>I</button>");
				var underline_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='u btn'>U</button>");
				var number_list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='num_list btn'><img width='18' heigth='18' src='../images/Instruments/numbered-list.png'></button>");
				var list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='list btn'><img width='18' heigth='18' src='../images/Instruments/ardzaganq2.png'></button>");
				var line_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='line btn'><img width='18' heigth='18' src='../images/Instruments/substract.png'></button>");

				for (var i = 0; i < value.length; i++){

					var div = $("<div class='form-group'></div>");

					if (tb_name != "news" && tb_name != "main_slider" && tb_name != "doctors_full_information" && tb_name != "ques_ans" && tb_name != "reviews"){

						if (keys[i] == "video"){

							var input = $("<input class='form-control' id='" + keys[i] + "' type='file'>");

							input.attr("name", keys[i]);

							div.append(input);

						}
						else {
							
							if (keys[i] != "id" && keys[i] != "time"){
							
								var input = $("<input class='form-control' id='" + keys[i] + "' type='text' value='" + value[i] + "'>");

								var label = $("<label>" + keys[i] + ": " + "</label>");

								div.append(label);

								var br_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='br btn'>br</button>");
								var b_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='b btn'>B</button>");
								var i_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='i btn'>I</button>");
								var underline_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='u btn'>U</button>");
								var number_list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='num_list btn'><img width='18' heigth='18' src='../images/Instruments/numbered-list.png'></button>");
								var list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='list btn'><img width='18' heigth='18' src='../images/Instruments/ardzaganq2.png'></button>");
								var line_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='line btn'><img width='18' heigth='18' src='../images/Instruments/substract.png'></button>");

								div.append(line_button);
								div.append(list_button);
								div.append(number_list_button);
								div.append(br_button);
								div.append(underline_button);
								div.append(b_button);
								div.append(i_button);
								div.append(input);

								input.attr("name", keys[i]);

								div.append(input);
							
							}

						}

					} 
					else if (tb_name == "news" || tb_name == "doctors" || tb_name == "faq" || tb_name == "main_slider" || tb_name == "ques_ans" || tb_name == "reviews" || tb_name == "doctors_full_information"){

						if (keys[i] != "id" && keys[i] != "time" && keys[i] != "photo_am" && keys[i] != "photo_ru" && keys[i] != "photo_eng"){

							var label = $("<label>" + keys[i] + ": " + "</label>");

							div.append(label);

						} 
						
						if (keys[i] == "title_am" || keys[i] == "title_ru" || keys[i] == "title_eng" || keys[i] == "doctors_id" 
							|| keys[i] == "name_am" || keys[i] == "name_ru" || keys[i] == "name_eng" || keys[i] == "surname_am" 
							|| keys[i] == "surname_ru" || keys[i] == "surname_eng" || keys[i] == "service_title_am" || keys[i] == "service_title_ru"
							|| keys[i] == "service_title_eng" || keys[i] == "link" || keys[i] == "operation_id" || keys[i] == "question_am" 
							|| keys[i] == "question_ru" || keys[i] == "question_eng"){

							if (keys[i] == "video") {

								var input = $("<input class='form-control' id='" + keys[i] + "' type='file' value='" + value[i] + "'>");
							
							}

							var input = $("<input class='form-control' id='" + keys[i] + "' type='text' value='" + value[i] + "'>");

							var br_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='br btn'>br</button>");
							var b_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='b btn'>B</button>");
							var i_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='i btn'>I</button>");
							var underline_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='u btn'>U</button>");
							var number_list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='num_list btn'><img width='18' heigth='18' src='../images/Instruments/numbered-list.png'></button>");
							var list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='list btn'><img width='18' heigth='18' src='../images/Instruments/ardzaganq2.png'></button>");
							var line_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='line btn'><img width='18' heigth='18' src='../images/Instruments/substract.png'></button>");

							div.append(line_button);
							div.append(list_button);
							div.append(number_list_button);
							div.append(br_button);
							div.append(underline_button);
							div.append(b_button);
							div.append(i_button);

							input.attr("name", keys[i]);
							div.append(input);

						}
						else if (keys[i] == "id" || keys[i] == "time" || keys[i] == "photo_am" || keys[i] == "photo_ru" || keys[i] == "photo_eng"){}
						else if (keys[i] == "video"){

							var input = $("<input class='form-control' id='" + keys[i] + "' type='file'>");

							input.attr("name", keys[i]);

							div.append(input);

						}
						else {
								
							var textarea = $("<textarea id='" + keys[i] + "' rows='10' cols='5' class='form-control' wrap='soft'>" + value[i] + "</textarea>");

							textarea.attr("name", keys[i]);

							var br_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='br btn'>br</button>");
							var b_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='b btn'>B</button>");
							var i_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='i btn'>I</button>");
							var underline_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='u btn'>U</button>");
							var number_list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='num_list btn'><img width='18' heigth='18' src='../images/Instruments/numbered-list.png'></button>");
							var list_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='list btn'><img width='18' heigth='18' src='../images/Instruments/ardzaganq2.png'></button>");
							var line_button = $("<button style='margin-left: 10px;margin-bottom:10px;' class='line btn'><img width='18' heigth='18' src='../images/Instruments/substract.png'></button>");

							div.append(line_button);
							div.append(list_button);
							div.append(number_list_button);
							div.append(br_button);
							div.append(underline_button);
							div.append(b_button);
							div.append(i_button);
							div.append(textarea);
	
						}

					}

					form.append(div)

				}

				formDiv.append(form);
				
			})

			form.append("<input type = 'hidden' name='action' value='saveDatatable'>");

			form.append("<input type = 'hidden' name='tb_name' value='" + tb_name + "'>");
			
			form.append("<input type = 'hidden' name='save_id' value='" + id + "'>");
			
			form.append($("<button id='save_photo' class='btn btn-danger save'>Save</button>"));

			$(".table_inf").after(formDiv);

		}
	})

})

function doEnter(){
    var editor = document.getElementById("text_area");
    var editorHTML = editor.value;
    var selectionStart = 0, selectionEnd = 0;
    if (editor.selectionStart) selectionStart = editor.selectionStart;
    if (editor.selectionEnd) selectionEnd = editor.selectionEnd;
    if (selectionStart != selectionEnd) {
        var editorCharArray = editorHTML.split("");
        editorCharArray.splice(selectionEnd, 0, "<br>");
        editorCharArray.splice(selectionStart, 0, "");
        editorHTML = editorCharArray.join("");
        editor.value = editorHTML;
    }
}

$(document).on("keydown", "#text_area", function(e){
	
	if (e.key == "Enter"){

		text = $("#text_area").val();
		
		$("#text_area").val(text + "<br>");		

	}

})

function styleText(id, end, start){
    var editor = document.getElementById(id);
    var editorHTML = editor.value;
    var selectionStart = 0, selectionEnd = 0;
    if (editor.selectionStart) selectionStart = editor.selectionStart;
    if (editor.selectionEnd) selectionEnd = editor.selectionEnd;
    if (selectionStart != selectionEnd) {
        var editorCharArray = editorHTML.split('');
        editorCharArray.splice(selectionEnd, 0, end);
        editorCharArray.splice(selectionStart, 0, start);
        editorHTML = editorCharArray.join('');
        editor.value = editorHTML;
    }
}

$(document).on('click', '.br', function(e){ 

	e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</br>', '');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</br>', '');

	}

});

$(document).on('click', '.line', function(e){ 

	e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</li>', '<li>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</li>', '<li>');

	}

});

$(document).on('click', '.num_list', function(e){ 
    
    e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</ol>', '<ol>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</ol>', '<ol>');

	}

})	

$(document).on('click', '.list', function(e){ 
    
    e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</ul>', '<ul>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</ul>', '<ul>');

	}
	
});

$(document).on('click', '.b', function(e){ 
    
    e.preventDefault();
		if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");
		(id_1)

		styleText(id_1, '</b>', '<b>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</b>', '<b>');

	}
	
});

$(document).on('click', '.i', function(e){ 
    
    e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</i>', '<i>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</i>', '<i>');

	}

});

$(document).on('click', '.u', function(e){ 
    
    e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, '</u>', '<u>');

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, '</u>', '<u>');

	}

});

$(document).on('click', '.u', function(e){ 

	var startA = $(this).attr("data-type");
	var closeA = $(this).attr("data-type-1");

	e.preventDefault();
	
	if ($(this).parent().find("input").attr("id")){

		var id_1 = $(this).parent().find("input").attr("id");

		styleText(id_1, closeA, startA);

	}
	
	if ($(this).parent().find("textarea").attr("id")){

		var id_2 = $(this).parent().find("textarea").attr("id");

		styleText(id_2, closeA, startA);

	}

})

// function reverse_clickable($string){
// 	$string = htmlspecialchars_decode($string);
// 	$string = preg_replace('#(<a.*?>).*?(</a>)#', '$1$2', $string);
// 	$needle = array('<a href="','" rel="nofollow"></a>');
// 	$string = str_replace($needle,"",$string);
// 	return $string;
// }

// $(document).on('click', '.a', function(e){ 
    
//     e.preventDefault();
	
// 	if ($(this).parent().find("input").attr("id")){

// 		var id_1 = $(this).parent().find("input").attr("id");


// 		id_1.val(reverse_clickable(styleText(id_1, "", "")));
// 		// styleText(id_1, '</a>', '<a href="">');

// 	}
	
// 	if ($(this).parent().find("textarea").attr("id")){

// 		var id_2 = $(this).parent().find("textarea").attr("id");

// 		id_2.html(reverse_clickable(styleText(id_2, "", "")));

// 		// styleText(id_2, '</a>', '<a href="">');

// 	}

// });

$(document).on("click", ".edit_photo", function(){

	$(".add").remove();

	$(".div_for_table").empty();

	var tb_name = global_tb_name;

	var data_id = $(this).attr("data-id");

	var formUploadPhoto = $("<form class='form_photo_upload' action='../controller/controller.php' method='post' enctype='multipart/form-data'></form>");
		
	formUploadPhoto.append($("<br><input id='input_photo_upload' data-id='" + data_id + "' type='file' name='photo'>"));

	var data_type = $("<input type='hidden' name='photo_value' value='" + data_id + "'>");
	
	var tb_name = $("<input type='hidden' name='photo_tb_name' value='" + tb_name + "'>");
	
	formUploadPhoto.append(tb_name);

	formUploadPhoto.append(data_type);

	$(".div_for_table").append(formUploadPhoto);

})

$(document).on("change", "#input_photo_upload", function(){
	
	$(".form_photo_upload").submit();

})

$(document).on("click", ".add", function(){

	var data_type = $(".add").attr("data-type");

	$(".table-responsive").css({
		"overflow-x": "visible"
	})

	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "addElements", tb_name: data_type},
		success: function(r){
			
			if (r){

				r = JSON.parse(r);
				
				$(".form-edit").remove();

				$(".table_inf").empty();

				var formDiv = $("<div class='container form-edit'></div>");

				var form = $("<form method='post' action='../controller/controller.php' id='form'></form>");

				form.append($("<h2>Add elements</h2>"));

				var div = $("<div class='form-group'></div>");

				Object.keys(r[0]).forEach(function(item){

					var div = $("<div class='form-group'></div>");

					if (data_type != "news" && data_type != "main_slider" && data_type != "doctors_full_information" && data_type != "ques_ans" && data_type != "reviews" && data_type != "gallery"){

						
						if (item != "time" && item != "id"){

							var input = $("<input class='form-control' id='" + item + "' type='text'>");

							var label = $("<label>" + item + ": " + "</label>");

							div.append(label);

							input.attr("name", item);

							div.append(input);
						
						}


					}
					else if (data_type == "news" || data_type == "doctors" || data_type == "gallery" || data_type == "faq" || data_type == "main_slider" || data_type == "ques_ans" || data_type == "reviews" || data_type == "doctors_full_information"){

						if (item != "time" && item != "id"  && item != "photo_am"  && item != "photo_ru"  && item != "photo_eng"){

							var label = $("<label>" + item + ": " + "</label>");

							div.append(label);


						}

						if (item == "id") {

							if (data_type == "gallery"){

								var label = $("<label>" + item + ": " + "</label>");

								div.append(label);

								var input = $("<input class='form-control' id='" + item + "' type='text'>");

								input.attr("name", item);

								div.append(input);

							}

						}

						if (item == "title_am" || item == "title_ru" || item == "title_eng" || item == "doctors_id" 
							|| item == "name_am" || item == "name_ru" || item == "name_eng" || item == "surname_am" 
							|| item == "surname_ru" || item == "surname_eng" || item == "service_title_am" || item == "service_title_ru"
							|| item == "service_title_eng" || item == "link" || item == "operation_id" || item == "question_am" 
							|| item == "question_ru" || item == "question_eng"){

							var input = $("<input class='form-control' id='" + item + "' type='text'>");

						
							input.attr("name", item);

							div.append(input);

						}
						else if (item == "id" || item == "time"  || item == "photo_am"  || item == "photo_ru"  || item == "photo_eng"){}
						else if (item == "video"){

							var input = $("<input class='form-control' id='" + item + "' type='file'>");

							input.attr("name", item);

							div.append(input);

						}
						else {

							var textarea = $("<textarea id='" + item + "' rows='10' cols='5' class='form-control' wrap='soft'></textarea>");

							textarea.attr("name", item);

							
							div.append(textarea);
	

						}

					}

					form.append(div);

				formDiv.append(form);
				
			})

				var photo_val = $("#photo_tmp_name").val();

				var photo_val_1 = $("#photo_tmp_name_1").val();

				form.append("<input type = 'hidden' name='action' value='addTbTable'>");

				form.append("<input type = 'hidden' name='tb_name' value='" + data_type + "'>");
				
				form.append("<input type = 'hidden' name='keys' value='" + Object.keys(r[0]) + "'>");

				// if (photo_val != "undefined") {

					form.append("<input type = 'hidden' name='values' value='" + Object.values(r[0]) + "'>");

				// }
				
				form.append($("<button class='btn btn-danger save'>Save</button>"));

				$(".table_inf").after(formDiv);

			}

		}
	})

})

// $(document).on("submit", ".form_photo_upload_1", function(){

// 	var form = $(".form_photo_upload_1");

// 	var formData = new FormData();
// (fdfsdfsd)
// 	if (($("#input_photo_upload_1")[0].files).length != 0){
		
// 		$.each($("#input_photo_upload_1")[0].files, function(i, file){

// 			formData.append("file[" + i + "]", file);
			
// 		});

// 	}
// 	else {

// 		return false;

// 	}
	
// 	$.ajax({
// 		url: "js/addPhoto.php",
// 		type: "post",
// 		data: formData,
// 		cache: false,
// 		contentType: false,
// 		processData: false,
// 		success: function(r){

// 			if (r) {

// 				r = JSON.parse(r);
// 				(r)
// 				var input = $("<input id='photo_tmp_name' name='photo' type='hidden' value='" + r.tmp_name[0] + "'>");
				
// 				var input_1 = $("<input id='photo_tmp_name_1' name='name_photo' type='hidden' value='" + r.name[0] + "'>");

// 				$("#form").append(input);
// 				$("#form").append(input_1);

// 			}
// 		}
// 	})
							
						
// 	return false;
							
// })

$(document).on("click", ".delete_message", function(){

	var data_id = $(this).attr("data-id");

	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "getStatus", data_id: data_id},
		success: function(r){
			location.reload();
		}
	})

})

$(document).on("click", ".edit_status", function(){

	var data_id = $(this).attr("data-id");

	$.ajax({
		url: "../controller/controller.php",
		type: "post",
		data: {action: "editStatus", data_id: data_id},
		success: function(r){
			location.reload();
		}
	})

})

