// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
    // 入力したTodoタスクの一覧を保持する配列を定義する
    const todo_array =[];
   
    /* HTMLのID値を使ってDOM要素を取得する */
    //  1 テキストボックス(input[type="text"])を要素を取得する。ここでは、[input-todo-box]
        //inputBoxが[input-todo-box]
    //  2 追加ボタン(button要素)を要素を取得する。   ここでは、[add-button]は addButtonと紐付けする！
        //addButtonが[add-button]
    //  3 Todoリストを一覧表示するul要素を取得する。ここでは、[todo-list]
        //addTaskTargetが[todo-list]
  
    const inputBox = document.getElementById('input-todo-box');//入力文字
    const addButton = document.getElementById('add-button');//追加
    const addTaskTarget = document.getElementById('todo-list');//表示


    /*「追加」ボタンがクリックされたときの処理 */
    //addButtonが[add-buton]追加
    addButton.addEventListener('click', (event) => {
      let count = event.detail;
      console.log('Click count is ' + count);

      //   テキストボックス(input-todo-box)[inputBox]に入力された(テキストの値を取り出して、Todoリスト一覧に追加する)
      const todos = { comment: inputBox.value,  };
      //todosは入力した文字とつながりあり、、
      //   取り出したらテキストボックスの中を空にする
      inputBox.focus();
      //level3-10 [配列の要素を変更しよう]push()要素を参考に配列でテキストの値を追加する。
      //これで入力した文字がconsole内表示される
      todo_array.push(todos);
      console.log(todo_array);
      //showTodos()関数で再表示
      showTodos();   //← これでリスト内に表示される？
   
    });

/* 「todos」の中身を一覧表示する */
function showTodos() {
  //    - ul要素にli要素(createElement)エリアを追加して、li要素内にtodoタスクの内容を表示する
  //addTaskTargetの中のli
  const tableId = document.createElement('addTaskTarget');

 todo_array.forEach((todo, index) => {
  //--------------
    var inputBox = document.getElementById('input-todo-box');
    var todos = { comment: inputBox.value,  };

    //-----------------
    //todo[index]の大きい数を取得したい！「大きい=length」
    var todo_length = todo_array.length;
    //一つずつ大きい数でその中のテキスト
    for (var i = 0; i < todo_length; i++) {
      todo_array[i].textContent=todo_array[i].textContent

     };
    
    var text = document.createTextNode(todo_length);//生成するテキストノードに含めるテキストを指定する。
    //表示させる内容
    tableId.appendChild(text);//tableId内は文字が入る
    addTaskTarget.appendChild(tableId);//tableIdはaddTaskTarget内にあり

    var deleteTodo = document.createElement('button');  
    deleteTodo.textContent = '削除';
    //削除（deleteTodo）をクリックされた時、showTodos()関数で削除する
    deleteTodo.addEventListener('click', () => {
      todos.remove();
    });
  });
}

console.log(deleteTodo);
/* todoの内容を削除する */
// Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタン[deleteTodo]をクリックしたら実行される。
function deleteTodo(index) {
  //   1- todosから対応するtodo情報を削除する
  return deleteButton;

  //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
  const todo = [inputBox];
  console.log('出力結果: ' + todo);
  names.splice(1,0,);
  //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
  deleteButton.innerHTML = 'Delete';

}

}

/*実行される関数 */
todo();