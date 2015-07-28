<?php

class User {
	public $username;
	private $password;
	
	function User($user, $pwd) {
		$this->username = $user;
		$this->password = $pwd;
	}

	function is_autheticated($password) {
		if ($password == $this->password) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

?>