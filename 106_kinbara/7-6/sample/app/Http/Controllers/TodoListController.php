<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
        $todo_lists = TodoList::all();
        Log::debug($todo_lists);
    //
    return view('todo_list.index', ['todo_lists'=> $todo_lists]);
    }
}
