<?php 

class Database 
{
	private $db;

	function __construct()
	{
		$this->db = new mysqli("localhost", "root", "", "diplom");
		$this->db->set_charset("utf8");
	}

	function showTablesName()
	{
		return $this->db->query("SHOW TABLES")->fetch_all();
	}

	function showTableS()
	{
		$table_inf = $_POST["table_name"];

		// if ($table_inf == "users")
		// {
			return $this->db->query("SELECT * FROM $table_inf")->fetch_all(MYSQLI_ASSOC);
		// }
		// elseif ($table_inf == "aaaa")
		// {
		// 	return $this->db->query("SELECT * FROM $table_inf")->fetch_all(MYSQLI_ASSOC);
		// }
	}

	function showTablesFields($tb_name)
	{
		$fields_name = $this->db->query("SELECT * FROM $tb_name")->fetch_fields();

		$arr = [];

		for ($i = 0; $i < count($fields_name); $i++){

			$arr[] = $fields_name[$i];

		}

		return $arr;
	}

	function delTdInTable($del_id, $tb_name)
	{
		$this->db->query("DELETE FROM $tb_name WHERE id = $del_id");
	}

	function update($tb_name, $data, $where)
	{
		$keys_1 = array_keys($data);
		
		$values_1 = array_values($data);

		$setData_1 = " ";
		
		$where_1 = " ";

		for ($i = 0; $i < count($keys_1); $i++) { 

			$setData_1 .= "$keys_1[$i] = '$values_1[$i]'" . ",";

		}

		$setData_1 = substr($setData_1, 0, -1);

		$keys_2 = array_keys($where);
		
		$values_2 = array_values($where);

		for ($i = 0; $i < count($keys_2); $i++) { 

			$where_1 .= "$keys_2[$i] = '$values_2[$i]'" . " AND ";

		}

		$where_1 = substr($where_1, 0, -4);

		$this->db->query("UPDATE $tb_name SET $setData_1 WHERE $where_1");
	}

	function new_user($tb_name, $data)
	{
		$keys = array_keys($data);

		$values = array_values($data);

		$insert_keys = " ";

		$insert_values = " ";

		for ($i = 0; $i < count($keys); $i++) { 

			$insert_keys .= $keys[$i] . ",";

			$insert_values .= "'$values[$i]',";


		}

		$insert_keys = substr($insert_keys, 0 , -1);

		$insert_values = substr($insert_values, 0 , -1);
		
		$this->db->query("INSERT INTO $tb_name ($insert_keys) VALUES ($insert_values)");

	}

	function addElement($tb_name)
	{
		return $this->db->query("SELECT * FROM $tb_name")->fetch_all(MYSQLI_ASSOC);
	}

	function saveAddElemetns($tb_name, $keys, $values)
	{
		$values = array_values($values);

		$insert_keys = " ";

		$insert_values = " ";

		for ($i = 0; $i < count($keys); $i++) { 

			$insert_keys .= $keys[$i] . ",";

			$insert_values .= "'$values[$i]',";

		}

		$insert_keys = substr($insert_keys, 0 , -1);

		$insert_values = substr($insert_values, 0 , -1);

		$this->db->query("INSERT INTO $tb_name ($insert_keys) VALUES ($insert_values)");
	}

	function saveTdInTable($save_id, $tb_name, $array_keys, $array_value)
	{
		$query = "UPDATE $tb_name SET ";

		for ($i = 0; $i < count($array_keys); $i++) { 

			$query .= "$array_keys[$i] = '$array_value[$i]',";

		}

		$query = substr($query, 0, -1);
		
		$query .= " WHERE id = $save_id";

		$this->db->query($query);
	}

	function editTdInTable($edit_id, $tb_name)
	{
		return $this->db->query("SELECT * FROM $tb_name WHERE `id` = $edit_id")->fetch_all(MYSQLI_ASSOC);
	}

	function userSignIn($tb_name, $data)
	{
		$result = $this->db->query("SELECT * FROM $tb_name WHERE `email` = '$data[email]' AND password = '$data[password]'")->fetch_all(MYSQLI_ASSOC);

		$user_id = $result[0]["id"];

		$test_result = $this->db->query("SELECT `user_id` FROM `tests` GROUP BY `user_id`")->fetch_all(MYSQLI_ASSOC);

		$isset;

		for ( $i = 0; $i < count($test_result); $i++ )
		{
			if ( $user_id == $test_result[$i]["user_id"] )
			{
				$isset = true;
				break;
			} 
			else
			{
				$isset = false;
			}
		}

		if ( $isset == false )
		{
			$this->db->query("INSERT INTO `tests` (`test_id`, `level`, `user_id`, `type`) VALUES (1, 1, $user_id, 'unlock')");

			for ( $i = 2; $i < 13; $i++ )
			{
				$this->db->query("INSERT INTO `tests` (`test_id`, `level`, `user_id`) VALUES (1, $i, $user_id)");
			}
		}

		return $result;
	}

	function ratingInfoSelect()
	{
		return $this->db->query("SELECT `name`, `surname`, `rating` FROM `users` ORDER BY `rating` DESC LIMIT 20")->fetch_all(MYSQLI_ASSOC);
	}

	function userNewInfo($user_id)
	{
		return $this->db->query("SELECT * FROM `users` WHERE `id` = $user_id")->fetch_all(MYSQLI_ASSOC);
	}

	function allUserInfo()
	{
		return $this->db->query("SELECT * FROM `users`")->fetch_all(MYSQLI_ASSOC);
	}

	function hakhomPageChange()
	{
		return $this->db->query("SELECT `page` FROM `ant_syn` GROUP BY `page`")->fetch_all(MYSQLI_ASSOC);
	}

	function callTest($test_id, $level)
	{
		return $this->db->query("SELECT * FROM `test_question` WHERE `level` = $level AND `test_id` = '$test_id'")->fetch_all(MYSQLI_ASSOC);
	}

	function testUserInfo($user_id)
	{
		return $this->db->query("SELECT * FROM `tests` WHERE `user_id` = $user_id")->fetch_all(MYSQLI_ASSOC);
	}

	function check_TestAnswer($answer, $test_id, $level, $type, $sum)
	{
		$result = $this->db->query("SELECT * FROM `test_question` WHERE (`test_id` = $test_id AND `level` = $level) AND `answer` = '$answer'")->fetch_all(MYSQLI_ASSOC);

		$id = $_SESSION["id"];

		$rating = $this->db->query("SELECT `rating` FROM `users` WHERE `id` = $id")->fetch_all(MYSQLI_ASSOC);
		
		if ( count($result) > 0 )
		{
			$rating[0]["rating"] += 300;

			$this->db->query("UPDATE `users` SET `rating` = " . $rating[0]["rating"] . " WHERE `id` = $id");
			if ( $rating[0]["rating"] >= $sum)
			{
				$level += 1;
				$this->db->query("UPDATE `tests` SET `type` = 'unlock' WHERE `user_id` = $id AND `level` = $level");
				if ( $level == 12 )
				{
					$level = 1;
				}
			}
		}
		
		return $result;
	}

	function checkAntPage($page, $ant_syn)
	{
		return $this->db->query("SELECT `word`, `$ant_syn` FROM `ant_syn` WHERE `page` = $page")->fetch_all(MYSQLI_ASSOC);
	}

	function checkTranslatePage($page)
	{
		return $this->db->query("SELECT `word`, `word_info` FROM `translate` WHERE `word_type` = '$page'")->fetch_all(MYSQLI_ASSOC);
	}

	function chooseEnglishLevel($type)
	{
		return $this->db->query("SELECT * FROM `$type`")->fetch_all(MYSQLI_ASSOC);
	}

	function checkType($val, $type)
	{
		return $this->db->query("SELECT `$val` FROM `$type`")->fetch_all(MYSQLI_ASSOC);
	}

	function searchWord($data)
	{
		if ( !empty( $data ) )
		{
			return $this->db->query("SELECT * FROM `translate` WHERE `word` LIKE '%$data%'")->fetch_all(MYSQLI_ASSOC);
		}
	}

	function shop()
	{
		return $this->db->query("SELECT * FROM `shop`")->fetch_all(MYSQLI_ASSOC);
	}

	function adInfo()
	{
		return $this->db->query("SELECT * FROM `ad`")->fetch_all(MYSQLI_ASSOC);
	}
////////////////////////////////////////////////////////////////////////////////////////////////

	function aaa($wt, $w, $wi)
	{
		$this->db->query("INSERT INTO `translate`(`word_type`, `word`, `word_info`) VALUES ('$wt', '$w', '$wi')");
		
	}

	// function bbb()
	// {
	// 	return $this->db->query("SELECT `question`, `answer` FROM `test_question` WHERE `level` > 10")->fetch_all(MYSQLI_ASSOC);
		
	// }

	// function ccc($s, $id)
	// {
	// 	$this->db->query("UPDATE `b1` SET `sentence` = '$s' WHERE `id` = $id");
	// 	$this->db->query("UPDATE `b2` SET `sentence` = '$s' WHERE `id` = $id");
	// 	$this->db->query("UPDATE `c1` SET `sentence` = '$s' WHERE `id` = $id");
	// 	$this->db->query("UPDATE `c2` SET `sentence` = '$s' WHERE `id` = $id");
		
	// }

	// function ddd($w, $a, $s, $p)
	// {
	// 	$this->db->query("UPDATE `ant_syn` SET `word` = '$w', `ant` = '$a', `syn` = '$s' WHERE `page` = '$p'");
	// }

////////////////////////////////////////////////////////////////////////////////////////////////

}


$db = new Database();




?>