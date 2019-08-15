<?php

namespace App\Maxserv_opdracht;

use Illuminate\Database\Eloquent\Model;
use PDO;
use DateTime;
use Auth;

class ToDoItem extends Model
{
	
	// Alle bewerkingen die direct van toepassing zijn op een todo item worden door deze class afgehandeld. 
	
	public function isExpired() {
		if (new DateTime($this->end_date) < new DateTime()) {
			if (!$this->finished) {
				return true;
			}
		} else {
			return false;
		}
	}
	
   	static public function updateToDoName($id, $name, $db){
		$id = ToDoSanitizer::sanitizeInteger($id);
		$name = ToDoSanitizer::sanitizeString($name);
		$userId = Auth()->user()->id;
		$params = ['name' => $name, 'id' => $id, 'user_id' => $userId];
		$statement = $db->prepare("UPDATE to_do_items SET name=:name WHERE id=:id AND user_id=:user_id");
		$statement->execute($params);
		
		$params2 = ['id' => $id, 'user_id' => $userId];
		$statement2 = $db->prepare("SELECT name, edit_date FROM to_do_items WHERE id=:id AND user_id=:user_id;");
		$statement2->execute($params2);
		$result = $statement2->fetch();
		
		$output = [$result['name'], $result['edit_date']];
		$output = json_encode($output);
		echo $output;
	}
	
	static public function updateToDoContent($id, $content, $db){
		$id = ToDoSanitizer::sanitizeInteger($id);
		$content = ToDoSanitizer::sanitizeString($content);
		$userId = Auth()->user()->id;
		$params = ['content' => $content, 'id' => $id, 'user_id' => $userId];
		$statement = $db->prepare("UPDATE to_do_items SET content=:content WHERE id=:id AND user_id=:user_id;");
		$statement->execute($params);
		
		$params2 = ['id' => $id, 'user_id' => $userId];
		$statement2 = $db->prepare("SELECT content, edit_date FROM to_do_items WHERE id=:id AND user_id=:user_id;");
		$statement2->execute($params2);
		$result = $statement2->fetch();
		
		$output = [$result['content'], $result['edit_date']];
		$output = json_encode($output);
		echo $output;
	}
	
	static public function updateFinished($id, $finished, $db) {
		$userId = Auth()->user()->id;
		$params = ['finished' => $finished, 'id' => $id, 'user_id' => $userId];
		$statement = $db->prepare("UPDATE to_do_items SET finished=:finished WHERE id=:id AND user_id=:user_id;");
		$statement->execute($params);
	}
	
	static public function addToDoItem($name, $content, $startDate, $endDate, $finished, $db) {
		$name = ToDoSanitizer::sanitizeString($name);
		$content = ToDoSanitizer::sanitizeString($content);
		$startDate = ToDoSanitizer::sanitizeDate($startDate);
		$endDate = ToDoSanitizer::sanitizeDate($endDate);
		$finished = $finished === 'true' ? 1 : 0;
		$author = Auth()->user()->name;
		$userId = Auth()->user()->id;
		$params = ['name' => $name, 'content' => $content, 'start_date' => $startDate, 'end_date' => $endDate, 'finished' => $finished, 'author' => $author, 'user_id' => $userId];
		$statement = $db->prepare("INSERT INTO to_do_items (name, content, start_date, end_date, finished, author, user_id) VALUES (:name, :content, :start_date, :end_date, :finished, :author, :user_id);");
		$statement->execute($params);
	}
	
	static public function deleteItems($ids, $db) {
		foreach ($ids as $id) {
			$id = ToDoSanitizer::sanitizeInteger($id);
			$userId = auth()->user()->id;
			$params = ['id' => $id, 'user_id' => $userId];
			$statement = $db->prepare("DELETE FROM to_do_items WHERE id=:id AND user_id=:user_id;");
			$statement->execute($params);
		}
	}
}
