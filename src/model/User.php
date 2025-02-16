<?php

class User {
	public static function login($user) {
		$_SESSION["user"] = $user;
	}

	public static function logout() {
		session_destroy();
	}

	public static function isLoggedIn() {
		return isset($_SESSION["user"]);
	}

	public static function getUsername() {
		return $_SESSION["user"]["username"];
	}
	public static function getName() {
		return $_SESSION["user"]["name"];
	}
	public static function getId() {
		return $_SESSION["user"]["id"];
	}
	public static function getEmail() {
		return $_SESSION["user"]["email"];
	}

	public static function setName($name) {
		$_SESSION["user"]["name"] = $name;
	}
	public static function setUsername() {
		$_SESSION["user"]["username"] = $username;
	}
	public static function setEmail() {
		$_SESSION["user"]["email"] = $email;
	}

	
}