<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maxserv_opdracht\ToDoModel;
use Auth;

class ToDoController extends Controller
{
	
	// Dit is de standaard controller
	
	private $_model;
	
	public function __construct() {
		$this->_model = new ToDoModel;
	}
	
    public function showList() {
		if (Auth::check()) {
			$toDoItemList = $this->_model->getToDoItemList();
			return view('todo', ['toDoItemList' => $toDoItemList]);
		} else {
			return view('todo');
		}
	}
}
