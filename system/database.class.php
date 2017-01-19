<?php
/*
*	Name   : Global Chat v1.0 Free Version
*	Author : Supian M
*	Email  : privcodelab@gmail.com
*	
*	2017 (c) www.priv-code.com
*/

class db {

	public $connect, $result; 

	public function connect(){
		$this->connect = mysqli_connect(db_hostname, db_username, db_password, db_name) or die('Failed to connect to MySQLI: ('.mysqli_connect_error());
		return $this->connect;
	}

	public function go($query = null, $id = 0){
		if($query != null):
			$this->query[$id] = mysqli_query($this->connect, $query) or die('Error executing query: ('.mysqli_errno($this->connect).')<br />'.mysqli_error($this->connect).'<hr/>'.$query);
            return $this->query[$id];
		endif;
	}

	public function fetchObject($id = 0){
		if(isset($this->query[$id]) && !empty($this->query[$id])):
			return mysqli_fetch_object($this->query[$id]);
		endif;
	}

	public function numRows($id = 0){
		if(isset($this->query[$id]) && !empty($this->query[$id])):
			return mysqli_num_rows($this->query[$id]);
		endif;
	}
	public function disconnect(){
		if(isset($this->connect) && !empty($this->connect)):
			mysqli_close($this->connect);
		endif;
	}
}