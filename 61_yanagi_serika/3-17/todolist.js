const todo_array = [];

function todo() {
  // 入力したTodoタスクの一覧を保持する配列を定義する
  
  /* HTMLのID値を使ってDOM要素を取得する */
  //  1 テキストボックス(input[type="text"])を要素を取得する。ここでは、[input-todo-box]
  const inputBox = document.getElementById('input-todo-box');//入力文字
  //  2 追加ボタン(button要素)を要素を取得する。   ここでは、[add-button]は addButtonと紐付けする！
  const addButton = document.getElementById('add-button');//追加
  //  3 Todoリストを一覧表示するul要素を取得する。ここでは、[todo-list]
  
  /*「追加」ボタンがクリックされたときの処理 */
  addButton.addEventListener('click', (event) => {
    // 一つ追加todo //todoは入力した文字とつながりあり、、
    const todos = { comment: inputBox.value};
    //inputBoxは空にする
    inputBox.focus();
    inputBox.value = '';
    //push()要素を参考に配列でテキストの値を追加する。
    //これで入力した文字がconsole内表示される
    todo_array.push(todos);

    //showTodos()関数で再表示
    showTodos();

  });
}
/* 「todos」の中身を一覧表示する */
function showTodos() {
  //    - ul要素にli要素(createElement)エリアを追加して、li要素内にtodoタスクの内容を表示する
  //addTaskTargetの中のli空
  const addTaskTarget = document.getElementById('todo-list');//表示
  
  //ul要素の子要素をリセット
  while (addTaskTarget.firstChild) {
    addTaskTarget.removeChild(addTaskTarget.firstChild);
  }

  todo_array.forEach((todos, index) => {
    //tableIdはli  ●
    const tableId = document.createElement('li');
    addTaskTarget.appendChild(tableId);//tableIdはaddTaskTarget内にあり

    //テキスト表示内容
    var todo_length = todos.comment;
    tableId.textContent = todo_length;


    var deleteTodo_button = document.createElement('button');
    deleteTodo_button.textContent = '削除';
    //リスト要素の子要素に削除ボタンを追加
    tableId.appendChild(deleteTodo_button);
    //削除（deleteTodo）をクリックされた時、showTodos()関数で削除する
    deleteTodo_button.addEventListener('click', () => {
      deleteTodo(index);
     
    });
  });
}

/* todoの内容を削除する */
// Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタン[deleteTodo]をクリックしたら実行される。
function deleteTodo(index) {
  //   1- todosから対応するtodo情報を削除する
  //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
  todo_array.splice(index, 1);
  //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
  showTodos();

}



/*実行される関数 */
todo(); 
