<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Maxserv_opdracht\DBConnection;
use App\Maxserv_opdracht\ToDoModel;
use App\Maxserv_opdracht\ToDoItem;

class FormController extends Controller {
	
	// Deze controller beheert input van formulieren
	
	private $_model;
	
	public function __construct() {
		$this->_model = new ToDoModel;
	}
	
	public function addToDoItem (Request $request) {
		$this->_model->addToDoItem($request);
		return redirect('todo');
	}
}
