// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
    // 入力したTodoタスクの一覧を保持する配列を定義する
   let todo = [];
   
    /* HTMLのID値を使ってDOM要素を取得する */
    //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
    var text = document.getElementById('input-todo-box');
    //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
    var addButton = document.getElementById('add-button');
    //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
    var TodoList = document.getElementById('todo-list');
    
    /*「追加」ボタンがクリックされたときの処理 */
    addButton.addEventListener('click', (event) => {

        var textValue = text.value;

        if(textValue !== ''){
            todo.push(textValue);
            text.value = '';
            showTodos();
        }

    });
   
    /* 「todos」の中身を一覧表示する */
    function showTodos() {  

        TodoList.innerHTML = '';

      //TodoリストをforEach繰り返しにして作成する
      todo.forEach((todo, index) => {

        var li = document.createElement('li');
            TodoList.appendChild(li);
            li.textContent =`${index+1}:${todo}`;
                
        var deleteBtn = document.createElement('button');
            deleteBtn.textContent='削除';
            li.appendChild(deleteBtn);    
                        
        deleteBtn.addEventListener('click', (event) => {
            deleteTodo(index);
        });    
      });
      
    }
   
    /* todoの内容を削除する */
    // Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
    function deleteTodo(index) {

        todo.splice(index, 1);
        showTodos();
   
    }
   
  }
   
  /*　実行される関数 */
  todo();