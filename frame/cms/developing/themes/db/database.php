<?php
class db extends father{
	function conn(){
		$server = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'amor';
		@$conn = new mysqli("$server","$user","$pass","$db");
		
		global $db_config;
		$db_config = array('server' =>$server ,'user'=>$user,'pass'=>$pass,'db'=>$db );
		return $conn;
		

		}


		public function get_db(){
			global $db_config;
			return $db_config;
		}


	}
	
?>