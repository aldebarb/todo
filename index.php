<?php 
require 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Todo List</title>
	<meta charset="utf-8">
</head>
<body>
    <h2>Welcome to the To-Do List</h2>
    <div id="menu">
    	<a href="index.php">Home</a>
    	<a href="index.php?p=add">Add an Item</a>
    </div>
    <div id="content">
    	<?php 
    	$pages_dir = 'admin';

    	if(!empty($_GET['p'])) {
    		$pages = scandir($pages_dir, 0);
    		unset($pages[0], $pages[1]);
    		$p = $_GET['p'];

    		if (in_array($p . '.php', $pages)) {
    			include ($pages_dir . '/' . $p . '.php');

    		} else {
    			echo "404 Page Not Found";
    		}

    	} else {
    		include ($pages_dir . '/home.php');
    	}
    	?>
    </div>
</body>
</html>