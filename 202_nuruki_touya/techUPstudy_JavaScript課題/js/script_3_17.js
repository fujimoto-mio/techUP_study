function todo() {
  // Todoを格納する配列
  let todos = [];

  // DOM要素の取得
  const inputBox = document.getElementById('input-todo-box'); // 1
  const addButton = document.getElementById('add-button');     // 2
  const todoList = document.getElementById('todo-list');       // 3

  // 追加ボタンを押したときの処理
  addButton.addEventListener('click', () => {
    const newTodo = inputBox.value.trim(); // 空白を削除
    if (newTodo !== '') {
      todos.push(newTodo);    // 配列に追加
      inputBox.value = '';    // 入力欄を空にする
      showTodos();            // 表示を更新
    }
  });

  // Todoリストの表示
function showTodos() {
    // 一旦リストをクリア
    todoList.innerHTML = '';

    todos.forEach((todo, index) => {
      const li = document.createElement('li');
      li.textContent = todo;

      const deleteBtn = document.createElement('button');
      deleteBtn.textContent = '削除';
      deleteBtn.addEventListener('click', () => {
        deleteTodo(index);
      });

      li.appendChild(deleteBtn);
      todoList.appendChild(li);
    });
  }

  // Todoを削除する処理
  function deleteTodo(index) {
    todos.splice(index, 1); // 指定のindexを削除
    showTodos();            // 表示を更新
  }
}

// 実行
todo();