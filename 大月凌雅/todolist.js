// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
  // 入力したTodoタスクの一覧を保持する配列を定義する
var todos = [];
 
  /* HTMLのID値を使ってDOM要素を取得する */
  //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
  //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
  //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
var input_list = document.getElementById("input-todo-box");
const addButton = document.getElementById("add-button");
var todo_list = document.querySelector("ul");
 
  /*「追加」ボタンがクリックされたときの処理 */
  addButton.addEventListener('click', (event) => {
    if (input_list.value === "") {
      return;
    }
    //   テキストボックスに入力されたテキストの値を取り出して、Todoリスト一覧に追加する
    //   取り出したらテキストボックスの中を空にする
    todos.push(input_list.value);
    input_list.value = "";
      
    //level3-10 [配列の要素を変更しよう]　push()要素を参考に配列でテキストの値を追加する。
    //showTodos()関数で再表示
    showTodos();
  });
 
  /* 「todos」の中身を一覧表示する */
  function showTodos() {
    //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
    while (todo_list.firstChild) {
      todo_list.removeChild(todo_list.firstChild);
    }

    //TodoリストをforEach繰り返しにして作成する
    todos.forEach((todo, index) => {
      var todo = document.createElement("li");
      todo.innerHTML = (index + 1) + ":" + todos[index];
      todo_list.appendChild(todo);
      //appendChildを使ってノードを追加する
      //　リストのli要素内に削除ボタンをつける（document.createElement('button');）
      const deleteButton = document.createElement("button");
      deleteButton.id = index;
      deleteButton.textContent = "削除";
      todo.appendChild(deleteButton);
      //削除をクリックされた時、showTodos()関数で削除する
      
      deleteButton.addEventListener('click',() => {
        deleteTodo(index);
      })
    });
  }
 
  /* todoの内容を削除する */
  // Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
  function deleteTodo(index) {
    //   1- todosから対応するtodo情報を削除する
    //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
    //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
    
    todos.splice(index, 1);
    showTodos();
  }
 
}
 
/*　実行される関数 */
todo();