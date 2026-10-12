'use strict';

    function todo(){

      var todos = [];

      var inputTodoBox = document.querySelector('#input-todo-box');
      var addButton = document.querySelector('#add-button');
      var todolist = document.querySelector('#todo-list');

      addButton.addEventListener('click', (event) => {
        todos.push(inputTodoBox.value);
        inputTodoBox.value = '';

        showTodos();
      });

    function showTodos() {

      todolist.innerHTML = '';

      todos.forEach((todo,index) => {

        var li = document.createElement('li');
        li.textContent = todo;

        var deleteButton = document.createElement('button');
        deleteButton.textContent = '削除';

        deleteButton.addEventListener('click', () => {
          deleteTodo(index);
        });

        function deleteTodo(index) {
          todos.splice(index,1);
          showTodos();
        }

        li.appendChild(deleteButton);

        todolist.appendChild(li);
      });
    }
    }

    todo();