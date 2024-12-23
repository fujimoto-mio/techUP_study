'use strict';

function todo() {
  // ToDoタスクの一覧を保持する配列
  const todos = [];

  // HTMLのID値を使ってDOM要素を取得する
  const inputBox = document.getElementById('input-todo-box');
  const addButton = document.getElementById('add-button');
  const todoList = document.getElementById('todo-list');

  // 「追加」ボタンがクリックされたときの処理
  addButton.addEventListener('click', () => {
    const todoText = inputBox.value;
    if (!todoText) return; // 入力値が空の場合は処理を終了

    // 配列に新しいToDoを追加
    todos.push(todoText);

    // リストを再表示
    showTodos();

    // テキストボックスをクリア
    inputBox.value = '';
  });

  // 「todos」の中身を一覧表示する
  function showTodos() {
    todoList.innerHTML = ''; // リストをクリア
    todos.forEach((todo, index) => {
      const li = document.createElement('li');
      li.textContent = `${index + 1} : ${todo}`;

      const deleteButton = document.createElement('button');
      deleteButton.textContent = '削除';
      deleteButton.addEventListener('click', () => {
        deleteTodo(index);
      });
      li.appendChild(deleteButton);

      todoList.appendChild(li);
    });
  }

  // todoの内容を削除する
  function deleteTodo(index) {
    todos.splice(index, 1); // 指定したインデックスの要素を1つ削除
    showTodos();
  }
}

todo();

