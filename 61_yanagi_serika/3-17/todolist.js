// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
    // 入力したTodoタスクの一覧を保持する配列を定義する
    const todos =[];
   
    /* HTMLのID値を使ってDOM要素を取得する */
    //  1 テキストボックス(input[type="text"])を要素を取得する。ここでは、[input-todo-box]
        //inputBoxが[input-todo-box]
    //  2 追加ボタン(button要素)を要素を取得する。   ここでは、[add-button]は addButtonと紐付けする！
        //addButtonが[add-button]
    //  3 Todoリストを一覧表示するul要素を取得する。ここでは、[todo-list]
        //addTaskTargetが[todo-list]
  
    const inputBox = document.getElementById('input-todo-box');
    const addButton = document.getElementById('add-button');
    const addTaskTarget = document.getElementById('todo-list');


    /*「追加」ボタンがクリックされたときの処理 */
    //addButtonが[add-buton]追加
    addButton.addEventListener('click', (event) => {
      //   テキストボックス(input-todo-box)[inputBox]に入力された(テキストの値を取り出して、Todoリスト一覧に追加する)
      const todos = { comment: inputBox.value,  };
      //   取り出したらテキストボックスの中を空にする
      inputBox.focus();
   
      //level3-10 [配列の要素を変更しよう]push()要素を参考に配列でテキストの値を追加する。????????????????
      //同じ？
      var todo_array = [todos,todos,todos];
      console.log(todos);   //これで入力した文字がconsole内表示される
      todo_array.push();
      console.log(todo_array+'deletTodo');
 
      //↑todoリスト一覧の配列 {comment: inputBox.value,}はtodoで紐付けているから紐付けた[todo]のarray

      //showTodos()関数で再表示
      showTodos();   //← これでリスト内に表示される？
   
    });

    
//上記34のshowTodos()の説明
/* 「todos」の中身を一覧表示する */
function showTodos() {
  //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
     //addTaskTargetの中のli
  const tableId = document.createElement('addTaskTarget');//（）内に''を入れないとエラーになる、、、、
  console.log(tableId);//addTaskTarget<><>表示される
  tableId.id = todos;
  tableId.innerHTML=todos;

  console.log(todos);
  //TodoリストをforEach繰り返しにして作成する
  todos.forEach((todo, index) => {

    //appendChildを使ってノードを追加する
    todos.appendChild(tableId);
    //リストのli要素内に削除ボタン（deleteTodo）をつける（document.createElement('button');）
    var deleteTodo = document.createElement('button');  
    deleteTodo.lastElementChild.remove();
    deleteTodo.textContent = '削除';
    //削除（deleteTodo）をクリックされた時、showTodos()関数で削除する
    document.getElementById("button").onclick = function() {
      showTodos();
    };
  });
}


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