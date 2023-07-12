

// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
  // 入力したTodoタスクの一覧を保持する配列を定義する
  const todo1 = [];
 
  /* HTMLのID値を使ってDOM要素を取得する */
  //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
  const box = document.getElementById ("input-todo-box");
  //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
  const button1 = document.getElementById ("add-button");
  //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
  const list1 = document.getElementById ("todo-list");
 
  /*「追加」ボタンがクリックされたときの処理 */
  button1.addEventListener('click', (event) => {
    //   テキストボックスに入力されたテキストの値を取り出して、Todoリスト一覧に追加する
    const todo = box.value;
    //   取り出したらテキストボックスの中を空にする
    box.value = "" ;
    //level3-10 [配列の要素を変更しよう]　push()要素を参考に配列でテキストの値を追加する。
    if (todo) {
    todo1.push(todo);
　　//showTodos()関数で再表示
    showTodos();
  }
});

/* 「todos」の中身を一覧表示する */
function showTodos() {
  //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
  while(list1.firstChild) {
    list1.removeChild( list1.firstChild );
  }

  //TodoリストをforEach繰り返しにして作成する
  todo1.forEach((todo, index) => {
    const todoItem = document.createElement('li');
    const taskNumber = index + 1;

    //appendChildを使ってノードを追加する
    todoItem.textContent = taskNumber + ":" + todo ;
    list1.appendChild(todoItem);

    //　リストのli要素内に削除ボタンをつける（document.createElement('button');）
    const deleteButton = document.createElement('button');
    deleteButton.textContent = '削除';
    deleteButton.addEventListener('click', (event) => {
      //削除をクリックされた時、showTodos()関数で削除する
      deleteTodo(index);
    });
    todoItem.appendChild(deleteButton);
  });
}

/* todoの内容を削除する */
// Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
function deleteTodo(index) {
  //   - todosから対応するtodo情報を削除する
  //   - 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
  todo1.splice(index, 1);
  //   - 削除後はshowTodosを実行して、Todoリストを再表示させる
  showTodos();
}
}

todo();