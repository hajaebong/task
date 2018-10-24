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
		return view('task.index');
    }
}
