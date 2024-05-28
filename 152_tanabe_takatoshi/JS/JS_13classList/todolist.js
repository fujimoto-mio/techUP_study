
function todo() {
  // 入力したTodoタスクの一覧を保持する配列を定義する
  let todos = [];
  //テキストボックスの要素を取得する。
  let = inputTodoBox = document.getElementById('input-todo-box');
  //追加ボタンを要素を取得する。
  let = addButton = document.getElementById('add-button');
  //Todoリストを一覧表示するul要素を取得する。
  let = todoList = document.getElementById('todo-list');

  //追加ボタンがクリックされた時の処理
  addButton.addEventListener('click', (event) => {
    //入力されたテキストをTodoリスト一覧に追加する
    let task = inputTodoBox.value;
    if(task.trim() !== '') { //input[text]が未入力でないことを確認する。
      todos.push(task); //テキストの値を配列に追加
      inputTodoBox.value = ''; //input[text]を空にする。
      showTodos(); //Todoリストを再表示
    }
  });

  //[todos]の中身を確認する
  function showTodos() {
    // Todoリストをリセット
    todoList.innerHTML = '';
    // TodoリストをforEach繰り返しにして作成する
    todos.forEach((todo, index) => {
      var li = document.createElement('li'); // li要素を作成
      li.textContent = todo; // li要素にタスクを追加
      todoList.appendChild(li); // Todoリストにli要素を追加

      // 削除ボタンを作成
      var deleteButton = document.createElement('button');
      deleteButton.textContent = '削除';
      deleteButton.addEventListener('click', function() {
        deleteTodo(index); // 削除ボタンがクリックされたら対応するTodoを削除する
      });
      li.appendChild(deleteButton); // li要素に削除ボタンを追加
    });
  }

  //todoの内容を削除す
  function deleteTodo(index) {
    todos.splice(index, 1); // 対応するtodo情報を削除する
    showTodos(); // Todoリストを再表示させる
  }
}

todo();