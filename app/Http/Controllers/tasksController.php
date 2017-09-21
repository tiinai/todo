<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class tasksController extends Controller
{
    //
    public function tasklist(Request $request){
        $tasks = Task::orderBy('created_at','asc')->get();
        return view('tasks', ['tasks'=> $tasks]);
    }
}
