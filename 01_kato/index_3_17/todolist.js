// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
const todos = [];//todosっていう配列変数にtodoリストの一覧が入っている

function todo() {
  // 入力したTodoタスクの一覧を保持する配列を定義するkannryou

  /* HTMLのID値を使ってDOM要素を取得するkannryou */
  //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
  const addTaskTarget = document.getElementById('input-todo-box');
    
  //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
  const addBotton = document.getElementById('add-button');
    
  //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
  const inputBox = document.getElementById('todo-list');
  while(inputBox.firstChild) {
    inputBox.removeChild(inputBox.firstChild);
  }

  /*「追加」ボタンがクリックされたときの処理kannryou */
  //   テキストボックスに入力されたテキストの値を取り出して、Todoリスト一覧に追加する
  //   取り出したらテキストボックスの中を空にする
  const task = addTaskTarget.value;
  todos.push(task);
  addTaskTarget.value = '';  
  //level3-10 [配列の要素を変更しよう]　push()要素を参考に配列でテキストの値を追加する。
  //showTodos()関数で再表示
  showTodos(inputBox);
}
  
/* 「todos」の中身を一覧表示する */
function showTodos(inputBox) {

  //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
  var index= 0;
  //TodoリストをforEach繰り返しにして作成する。フォーイーチは配列変数のデータの数分繰り返すます。(todo)の中には1回目のループの時は、配列変数の一個目の要素が入ってくる。②回目になると配列変数の2個目が入ってくるます。
  todos.forEach((todo) => {

    //appendChildを使ってノードを追加するkannryou
    const showItem = document.createElement('li');
    showItem.innerHTML = todo;

    //　リストのli要素内に削除ボタンをつける（document.createElement('button');）kannryou
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '削除';
    deleteButton.setAttribute('onclick','deleteTodo('+ index +');');
    showItem.appendChild(deleteButton);
    inputBox.appendChild(showItem)
    
    //削除をクリックされた時、showTodos()関数で削除する
    index++;
  });
}
  
/* todoの内容を削除処理を作る */
// Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
function deleteTodo(index) {

  //   1- todosから対応するtodo情報を削除する
  //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
  todos.splice(index,1);
  //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
  const inputBox = document.getElementById('todo-list');
  while(inputBox.firstChild) {
    inputBox.removeChild(inputBox.firstChild);
  }
  showTodos(inputBox);
}
  
/*　実行される関数 */
