<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TodoList;  //追記
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  //追記

class TodoListController extends Controller
{
    //追記
    public function index(Request $request)
    {
        $todo_lists=TodoList::all();
        Log::debug($todo_lists);

        return view('todo_list.index',['todo_lists'=>$todo_lists]);

    }
}
