<?php

namespace App\Http\Controllers;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class TodoListController extends Controller
{
    public function index(Request $request)
    {
        //TodoList::all();でToolListのテーブルデータをすべて(all())取得します。
        $todo_lists = TodoList::all();
        Log::debug($todo_lists);//ここでデバッグのためログをだして表示を確認してみます。
 
        // viewメソッドすなわち、表示するデータをここで送っています。
        //$todo_listsのデータを'todo_lists'に渡して、todo_list.indexのページに送ります。
        return view('todo_list.index', ['todo_lists'=> $todo_lists]);
    }
}
