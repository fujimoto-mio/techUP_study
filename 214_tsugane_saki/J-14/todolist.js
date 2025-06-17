'use strict'

    function todo {
        const todos = [];
        const inputBox = document.getElementById('input-todo-box');
        const addButton = document.getElementById('add-button');
        const todoList = document.getElementById('todo-list');
    }

    addButton.addEventListener('click', function(event) {
        const text = inputBox.value.trim();
        if(text !== "") {
            todos.push(text);
            inputBox.value = "";
            showTodos();
        }
    });

    function showTodos() {
        todoList.innterHTML = "";
        todos.forEach(function(todo, index) {
            const li = document.createElement('li');
            li.textContent = todo;

            const deleteButton = document.createElement('button');
            deleteButton.textContent = "削除";
            deleteButton.addEventListener('click', function() {
                deleteTodo(index);
            });

            li.appendChild(deleteButton);
            todoList.appendChild(li);
        });
    }
    