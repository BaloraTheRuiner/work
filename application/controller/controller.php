<?php 

include "../model/model.php";
session_start();

class Controller 
{

	private $db;

	function __construct()
	{
		$this->db = new Database();

		if ( $_SERVER["REQUEST_METHOD"] == "POST" )
		{
			if ( isset($_POST["action"]) )
			{
				$action = $_POST["action"];
				call_user_func( [$this, $action] );
			}
		}

	}

	function register()
	{
		$name 		= $_POST["name"];
		$surname 	= $_POST["surname"];
		$email		= $_POST["email"];
		$password 	= $_POST["password"];
		$repassword = $_POST["repassword"];

		$all_user = $this->db->allUserInfo();

		$check = false;

		foreach ($all_user as $key)
		{
			if ($email == $key["email"])
			{
				$check = true;
				break;
			} 
			else 
			{
				$check = false;
			}
		}

		if ($check == true)
		{
			if ($password != $repassword)
			{
				header("Location: ../view/index.php?val=3");
			}
			else
			{
				header("Location: ../view/index.php?val=1");
			}
		}
		else 
		{
			if ($password == $repassword)
			{
				$this->db->new_user("users", [
					"name" 		=> $name,
					"surname" 	=> $surname,
					"email" 	=> $email,
					"password" 	=> $password
				]);

				header("Location: ../view/index.php");
			}
			else 
			{
				header("Location: ../view/index.php?val=2");
			}
		}

	}

	function signIn()
	{
		$email 		= $_POST["email"];
		$password 	= $_POST["password"];

		$user = $this->db->userSignIn("users", [
			"email" 	=> $email,
			"password" 	=> $password
		]);

		if ( count( $user ) == 0 )
		{
			header("Location: ../view/index.php?val=no");
		}
		else 
		{
			$_SESSION["id"] 		= $user[0]["id"];
			$_SESSION["name"] 		= $user[0]["name"];
			$_SESSION["surname"] 	= $user[0]["surname"];
			$_SESSION["email"] 		= $user[0]["email"];
			$_SESSION["password"] 	= $user[0]["password"];
			$_SESSION["photo"] 		= $user[0]["photo"];
			$_SESSION["rating"] 	= $user[0]["rating"];
			header("Location: ../view/index.php");
		}

		
	}

	function userLeave()
	{
		if ( isset ( $_SESSION["id"] ) )
		{
			unset( $_SESSION["id"] );
			unset( $_SESSION["name"] );
		}
	}

	static function url()
	{

		$url = $_SERVER["REQUEST_URI"];
		$url = explode("/", $url);
		var_dump($url);

		if ( !empty( $url[1] ) )
		{
			$controller_name = $url[1];
		}

		if ( !empty( $url[2] ) )
		{
			$method_name = $url[2]; 
		}		

		$controller_file = strtolower($controller_name) . ".php";
		$method	 = strtolower($method_name) 	. ".php";

		if (file_exists($controller_file))
		{
			if (method_exists(new Controller, $method))
			{
				print "xasd";
			}
		}

	}

	function showTablesInSelect()
	{
		$db_name = $_POST["table"];
		print json_encode($this->db->showTablesName($db_name));
	}

	function showTables()
	{
		$db_name = $_POST["db_name"];
		print json_encode($this->db->showTableS($db_name));
	}
	
	function showFields()
	{
		$table_name = $_POST["table_name"];
		print json_encode($this->db->showTablesFields($table_name));
	}

	function deletes()
	{
		$del_id = $_POST["del_id"];
		$db_name = $_POST["db_name"]; 
		$tb_name = $_POST["tb_name"];

		$this->db->delTdInTable($del_id, $db_name, $tb_name);
	}

	function edit()
	{
		$edit_id = $_POST["edit_id"];
		$db_name = $_POST["db_name"];
		$tb_name = $_POST["tb_name"];

		print json_encode($this->db->editTdInTable($edit_id, $db_name, $tb_name));
	}

	function saveDatatable()
	{
		$tb_name = $_POST["tb_name"];
		$save_id = $_POST["save_id"];
		$save = $_POST;
		
		unset($save["action"], $save["tb_name"], $save["save_id"]);
		
		$keys = array_keys($save);
		$values = array_values($save);

		$this->db->saveTdInTable($save_id, $tb_name, $keys, $values);

		header("Location: ../admin/index.php");
	}

	function addElements()
	{
		$tb_name = $_POST["tb_name"];
		$result = $this->db->addElement($tb_name);

		print json_encode($result);
	}

	function addTbTable()
	{
		$tb_name = $_POST["tb_name"];
		$keys = $_POST["keys"];
		$values = $_POST["values"];
		$save = $_POST;

		unset($save['action'], $save["tb_name"], $save["keys"], $save["values"]);

		$keys = array_keys($save);
		
		$values = array_values($save);

		$this->db->saveAddElemetns($tb_name, $keys, $values);
		
		header("Location: ../admin/index.php");
	}

	function user_info_save()
	{

		$user_id 	= $_POST["user_id"];
		$field_id 	= $_POST["field_id"];
		$user_info 	= $_POST["user_info"];

		if ( $field_id == 1 )
		{
			$this->db->update("users", ["name" => $user_info], ["id" => $user_id]);	
		} elseif ( $field_id == 2 )
		{
			$this->db->update("users", ["surname" => $user_info], ["id" => $user_id]);	
		} elseif ( $field_id == 3 )
		{
			$this->db->update("users", ["email" => $user_info], ["id" => $user_id]);	
		} elseif ( $field_id == 4 )
		{
			$this->db->update("users", ["password" => $user_info], ["id" => $user_id]);	
		}

		$result = $this->db->userNewInfo($user_id);

		if ( isset( $_SESSION["name"] ) )
		{
			unset($_SESSION["name"]);
			$_SESSION["name"] = $result[0]["name"];
		}

		if ( isset( $_SESSION["surname"] ) )
		{
			unset($_SESSION["surname"]);
			$_SESSION["surname"] = $result[0]["surname"];
		}

		if ( isset( $_SESSION["email"] ) )
		{
			unset($_SESSION["email"]);
			$_SESSION["email"] = $result[0]["email"];
		}

		if ( isset( $_SESSION["password"] ) )
		{
			unset($_SESSION["password"]);
			$_SESSION["password"] = $result[0]["password"];
		}

		print json_encode($result);

	}

	function testLevel()
	{
		$test_id = $_POST["test_id"];
		$type	 = $_POST["type"];
		$level	 = $_POST["level"];
		$user_id = $_POST["user_id"];

		$result = $this->db->callTest($test_id, $level);
		print json_encode($result);
	}

	function checkAnswer()
	{
		
		$answer  = $_POST["answer"];
		$test_id = $_POST["test_id"];
		$level	 = $_POST["level"];
		$type	 = $_POST["type"];
		$sum	 = $_POST["sum"];

		$result = $this->db->check_TestAnswer($answer, $test_id, $level, $type, $sum);
		print json_encode($result);
	}

	function antPageChange()
	{
		$page 	 = $_POST["page"];
		$ant_syn = $_POST["ant_syn"];

		$result = $this->db->checkAntPage($page, $ant_syn);
		print json_encode($result);
	}

	function translatePageChange()
	{
		$page 	 = $_POST["page"];

		$result = $this->db->checkTranslatePage($page);
		print json_encode($result);
	}

	function changeUserPhoto()
	{
		$val 	= $_POST["val"];
		$id 	= $_SESSION["id"];

		if ( $val == 0 )
		{
			$val = 1;
		} else {
			$val = 0;
		}

		$_SESSION["photo"] = $val;

		$result = $this->db->update("users", ["photo" => $val], ["id" => $id]);
	}

	function chooseLevel()
	{
		if ( isset( $_SESSION["eng_type"] ) )
		{
			unset( $_SESSION["eng_type"] );
		}

		$type = $_POST["type"];

		$_SESSION["eng_type"] = $type;

		print 0;
	}

	function chooseType()
	{
		$val = $_POST["val"];

		$type = $_SESSION["eng_type"];

		$result = $this->db->checkType($val, $type);
		print json_encode($result);
	}

	function search()
	{
		$data = $_POST["data"];

		if ( !empty( $data ) )  
		{
			$result = $this->db->searchWord($data);
			print json_encode($result);
		}
	}

}




$obj = new Controller();







 ?>