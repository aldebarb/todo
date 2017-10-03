<?php 

if (isset($_POST['submit'])) {
	//Remove malicious code
	$item = htmlentities($_POST['item'], ENT_QUOTES, 'UTF-8');

	if (empty($item)) {
		echo "Enter something To do";
	} else {
		$addItem = new ToDoList(0);
		$addItem->setItem($item);
		$addItem->setStartDate(strftime("%B %d, %Y at %X"));
		$addItem->save($mysqli);
		header("location: index.php");
	}
}
?>
<form method="post" action="">
	<caption>Item</caption>
	<textarea name="item" rows="1", cols="40" maxlength="40"></textarea><br><br>
	<input type="submit" name="submit" value="Add Item">
</form>