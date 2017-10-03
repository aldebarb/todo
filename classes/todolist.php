<?php 
/* Schema
       list(item_id, item, finished, start_date, finish_date);
*/

class ToDoList
{
	protected $_itemId;
	protected $_item;
	protected $_finished;
	protected $_startDate;
	protected $_finishDate;

    public function __construct($itemId) 
    {
        $this->_itemId = $itemId;
    }
    public function setItem($item) 
    {
    	$this->_item = $item;
    }
    public function setFinished($finished)
    {
    	$this->_finished = $finished;
    }
    public function setStartDate($startDate)
    {
    	$this->_startDate = $startDate;
    }
    public function setFinishDate($finishDate)
    {
    	$this->_finishDate = $finishDate;
    }
    public function getItem()
    {
    	return $this->_item;
    }
    public function getFinished()
    {
    	return $this->_finished;
    }
    public function getStartDate()
    {
    	return $this->_startDate;
    }
    public function getFinishDate()
    {
    	return $this->_finishDate;
    }
    public function save($mysqli)
    {
    	if ($this->_itemId == 0) {
    		$this->createItem($mysqli);

    	} else {
    		$this->updateItem($mysqli);
    	}
    }
    public function createItem($mysqli)
    {
    	$mysqli->query("INSERT INTO list (item, start_date) VALUES ('$this->_item', '$this->_startDate')");
    }
    public function updateItem($myslqi)
    {
        $mysqli->query("UPDATE list SET item = '$this->_item', start_date = '$this->_startDate'");
    }
    public function softDeleteItem($mysqli)
    {
        $mysqli->query("UPDATE list SET is_deleted = 1 WHERE item_id = '$this->_itemId'");
    }
    public function loadTable($mysqli)
    {
        $result = $mysqli->query("SELECT item_id, item, start_date, finish_date, is_deleted FROM list WHERE is_deleted = 0 ORDER BY item_id");
        return $result;
    }
}    
?>