/*Todoタスクの一覧を保持*/
var todos = [];

/*DOM要素を取得*/
/*テキストボックス要素*/
/*追加ボタン要素*/
/*Todoリスト一覧表示するul要素*/
var inputTodoBox = document.getElementById('input-todo-box');
var addButton = document.getElementById('add-button');
var todoList = document.getElementById('todo-list');

/*追加ボタンの処理*/
addButton.addEventListener('click', (event) => {
    var todo = inputTodoBox.value;
    inputTodoBox.value = '';

    if (todo) {
        todos.push(todo);
        showTodos();
    }
});

/*todosの中身を表示*/
function showTodos() {
    while (todoList.firstChild) {
        todoList.removeChild(todoList.firstChild);
    }

    todos.forEach((todo, index) => {
        var todoItem = document.createElement('li');
        var taskNumber = index + 1;

        todoItem.textContent = `${taskNumber} : ${todo}`;
        todoList.appendChild(todoItem);

        /*削除ボタン*/
        var deleteButton = document.createElement('button');
        deleteButton.textContent = '削除';
        /*押されたとき*/
        deleteButton.addEventListener('click', (event) => {
            deleteTodo(index);
        });
        todoItem.appendChild(deleteButton);
    });
}

/*todoの内容を削除する*/
function deleteTodo(index) {
    todos.splice(index, 1);
    showTodos();
}
