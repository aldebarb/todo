<?php

require '../includes/config.php';
$itemId = htmlentities($_GET['itemId'], ENT_QUOTES, 'UTF-8');
$deleteItem = new ToDoList($itemId);
$deleteItem->softDeleteItem($mysqli);
header("location: ../index.php");

?>
