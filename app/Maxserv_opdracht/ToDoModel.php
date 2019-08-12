<?php

namespace App\Maxserv_opdracht;

use Illuminate\Database\Eloquent\Model;
use PDO;

class ToDoModel extends Model
{
	private $_connection, $_db;
	private $_toDoItemList = ['expired' => [], 'notExpired' => []];
	
	public function __construct() {
		$this->_connection = DBConnection::getInstance('maxserv_opdracht');
		$this->_db = $this->_connection->getConnection();
	}
	
    public function getToDoItemList() {
		$userId = Auth()->user()->id;
		$params = ['user_id' => $userId];
		$statement = $this->_db->prepare("SELECT * FROM to_do_items WHERE user_id=:user_id;");
		$statement->execute($params);
		$results = $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_CLASS, ToDoItem::class);
		$results= array_map('reset',$results);
		foreach ($results as $key => $toDoItem) {
			$toDoItem->id = $key;
			if ($toDoItem->isExpired()) {
				$this->_toDoItemList['expired'][] = $toDoItem;
			} else {
				$this->_toDoItemList['notExpired'][] = $toDoItem;
			}
			$this->_toDoItemList[] = $toDoItem;
		}
		return $this->_toDoItemList;
	}
	
	public function updateToDoName($request){
		$id = $request->input('id');
		$name = $request->input('name');
		ToDoItem::updateToDoName($id, $name, $this->_db);
	}
	
	public function updateToDoContent($request){
		$id = $request->input('id');
		$content = $request->input('content');
		ToDoItem::updateToDoContent($id, $content, $this->_db);
	}
	
	public function updateFinished($request) {
		$id = $request->input('id');
		$finished = $request->input('finished') === 'true' ? 1 : 0;
		ToDoItem::updateFinished($id, $finished, $this->_db);
	}
	
	public function addToDoItem($request) {
		$name = ToDoSanitizer::sanitizeString($request->input('name'));
		$content = ToDoSanitizer::sanitizeString($request->input('content'));
		$startDate = ToDoSanitizer::sanitizeDate($request->input('startDate'));
		$endDate = ToDoSanitizer::sanitizeDate($request->input('endDate'));
		$author = Auth()->user()->name;
		$finished = $request->input('finished') === 'true' ? 1 : 0;
		$userId = Auth()->user()->id;
		
		ToDoItem::addToDoItem($name, $content, $startDate, $endDate, $finished, $author, $userId, $this->_db);
	}
	
	public function deleteItems($ids) {
		ToDoItem::deleteItems($ids, $this->_db);
	}
}
