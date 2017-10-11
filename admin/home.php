<?php 
/*  Schema
/        list (item_id, item, start_date, finish_date)
/*/
$newTable = new ToDoList(0);
$result = $newTable->loadTable($mysqli);
$count = 1;

if ($result->num_rows > 0) {
        echo "<hr/>";
	
        while ($row = $result->fetch_assoc()) {
        echo "<p>" . $count . ") [" . $row['item'] . "] Started On: " . $row['start_date'];
        
        if (empty($row['finish_date'])) {
        	echo "</p>";
        
        } else {
        	echo "Finished  On: " . $row['finish_date'] . "</p>";
        }
        echo "<form method ='post' action='admin/delete.php?itemId=" . $row['item_id'] . "'>
        <input type='submit' name='delete' value='Delete'>
        </form><hr/>";
        $count++;
	}

} else {
	echo "<h2>You have nothing to do today!</h2>";
}
?>
