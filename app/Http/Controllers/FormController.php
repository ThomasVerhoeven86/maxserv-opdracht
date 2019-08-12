<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Maxserv_opdracht\DBConnection;
use App\Maxserv_opdracht\ToDoModel;
use App\Maxserv_opdracht\ToDoItem;
// use App\Maxserv_opdracht\ToDoController;

class FormController extends Controller {
	
	// static public $connection, $db;
	private $_model;
	
	public function __construct() {
		$this->_model = new ToDoModel;
	}
	
	public function addToDoItem (Request $request) {
		$this->_model->addToDoItem($request);
		// echo '<pre>';
		// var_dump($request);
		// echo $request->input('name');
		// echo '</pre>';
		return redirect('todo');
	}
	
	public function deleteToDoItem(Request $request) {
		// var_dump($request->all());
		$toDoItem = new ToDoItem();
		$toDoItem->deleteToDoItem($request->id);
		return redirect('todo');
	}
}
