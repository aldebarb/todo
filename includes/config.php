<?php 
$mysqli = new mysqli('localhost', 'root', 'password', 'todo_db');

if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

function __autoload($class) 
{
	$class = strtolower($class);
	$classPath = 'classes/' . $class . '.php';

	if (file_exists($classPath)) {
		require $classPath;
	}
	$classPath = '../classes/' . $class . '.php';
	
	if (file_exists($classPath)) {
		require $classPath;
	}
	$classPath = '../../classes/' . $class . '.php';
	
	if (file_exists($classPath)) {
		require $classPath;
	}
}

?>