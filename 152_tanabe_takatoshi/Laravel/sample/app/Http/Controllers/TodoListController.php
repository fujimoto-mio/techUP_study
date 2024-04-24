<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    //
    public function index(Request $request)
    {
        $todo_lists = TodoList::all();
        Log::debug($todo_lists);
        return view('todo_list.index', ['todo_lists' => $todo_lists]);
    }
}
