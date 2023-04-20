// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
    // 入力したTodoタスクの一覧を保持する配列を定義する
    const todos =[];
   
    /* HTMLのID値を使ってDOM要素を取得する */
    //  1 テキストボックス(input[type="text"])を要素を取得する。ここでは、[input-todo-box]
    //  2 追加ボタン(button要素)を要素を取得する。   ここでは、[add-button]は addButtonと紐付けする！
    //  3 Todoリストを一覧表示するul要素を取得する。ここでは、[todo-list]
  
    const inputBox = document.getElementById('input-todo-box');
    const addButton = document.getElementById('add-button');
    const addTaskTarget = document.getElementById('todo-list');


    /*「追加」ボタンがクリックされたときの処理 */
    addButton.addEventListener('click', (event) => {
      //   テキストボックス(todo-box)に入力された(テキストの値を取り出して、Todoリスト一覧に追加する)
      const todo = { comment: inputBox.value,  };
      //   取り出したらテキストボックスの中を空にする
      inputBox.focus();


   
      //level3-10 [配列の要素を変更しよう]push()要素を参考に配列でテキストの値を追加する。
      inputBox_array = [];
  　　//showTodos()関数で再表示
      showTodos();
   
    });
 
/* 「todos」の中身を一覧表示する */
function showTodos() {
  //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
  const tableId = document.createElement('li');
  //TodoリストをforEach繰り返しにして作成する
  todos.forEach((todo, index) => {

    //appendChildを使ってノードを追加する
    tableRecord.appendChild(addTaskTarget);
    //リストのli要素内に削除ボタンをつける（document.createElement('button');）
    const deleteButton = document.createElement('button');
　　  //削除をクリックされた時、showTodos()関数で削除する
     deleteButton.textContent = '削除';
     return deleteButton;
  });
}

/* todoの内容を削除する */
// Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
function deleteTodo(index) {
  //   1- todosから対応するtodo情報を削除する
  return deleteButton;
  //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
  var addTaskTarget = [];
  //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
  deleteButton.innerHTML = 'Delete';

}

}

/*実行される関数 */
todo();