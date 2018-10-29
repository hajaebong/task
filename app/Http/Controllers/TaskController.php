<?php

namespace App\Http\Controllers;

use app\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
	protected $tasks;

    public function __construct(TaskRepository $tasks) {
        $this -> middleware('auth');

        $this -> tasks = $tasks;
    }

    public function index(Request $request){
		return view('task.index', [
			'tasks' => $this -> tasks -> forUser($request -> user()),
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
