<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maxserv_opdracht\ToDoModel;
use Auth;

class AjaxController extends Controller
{
	private $_model;
	
	public function __construct() {
		$this->_model = new ToDoModel;	
	}
	
    public function updateToDoName(Request $request) {
		$this->_model->updateToDoName($request);
	}
	
	public function updateToDoContent(Request $request) {
		$this->_model->updateToDoContent($request);
	}
	
	public function updateFinished(Request $request) {
		$this->_model->updateFinished($request);
	}
	
	public function deleteItems() {
		if (isset($_POST['ids'])) {
			$this->_model->deleteItems($_POST['ids']);			
		}
	}
}
