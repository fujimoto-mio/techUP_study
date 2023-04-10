'use strict';
function todo() {
const txt = document.getElementById('input-todo-box');
const btn = document.getElementById('add-button');
const list = document.getElementById('todo-list');
const todos = [];

btn.addEventListener('click',(event) =>{
    const todo = txt.value;

    if(todo){
        todos.push(todo);
        txt.value = '';
        showTodos();
    }

    function showTodos() {
        list.textContent = '';

        todos.forEach((todo, index) => {
            const li = document.createElement('li');
            li.textContent = index+1 +' : ' + todo;
            list.appendChild(li);

            const del = document.createElement('button');
            del.textContent = '削除';
            li.appendChild(del);

            del.addEventListener('click',() =>{
                deleteTodo(index);
            });
        });
    }

    function deleteTodo(index) {
        todos.splice(index,1);
        showTodos();
    }
});
}

todo();