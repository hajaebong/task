<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function __construct() {
        $this -> middleware('auth');
    }

    public function index(Request $request){
    	$task = Task::where('user_id', $request -> user() -> id) -> get();

		return view('task.index', [
			'tasks' => $task,
		]);
    }

    public function store(Request $request){
    	$this -> validate($request,[
    		'name' => 'required | max:255',
	    ]);

    	$request -> user() -> task() -> create([
    		'name' => $request -> name,
	    ]);

    	return redirect('/tasks');
    }


}
