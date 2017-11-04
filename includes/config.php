<?php 

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

$instance = ConnectDb::getInstance();
$mysqli = $instance->getConnection();
?>