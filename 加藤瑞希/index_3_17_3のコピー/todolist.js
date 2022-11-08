
// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo(event){

// 入力したTodoタスクの一覧を保持する配列を定義する　完了
const todos = [];
  
    /* HTMLのID値を使ってDOM要素を取得する　完了 */
    //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
    const inputBox = document.getElementById('input-todo-box')[0];
    //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
    const addButton = document.getElementById('add-button')[0];
    //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
    const addTodoList = document.getElementById('todo-list')[0];

  
    /*「追加」ボタンがクリックされたときの処理 完了？*/
    addButton.addEventListener('click', () => {
      //   テキストボックスに入力されたテキストの値を取り出して、Todoリスト一覧に追加する
      const todo = createToDo();
      todos.push(todo);
      //   取り出したらテキストボックスの中を空にする
      inputBox.value = '';
      radioChange();
      //level3-10 [配列の要素を変更しよう]　push()要素を参考に配列でテキストの値を追加する。
      var result = items.push();
  　　//showTodos()関数で再表示
const showTodos = ();
    });
  
    /* 「todos」の中身を一覧表示する */
    function showTodos() {
      //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
  const element = document.createElement('li')
  element.textContent = "Hello World!";
      //TodoリストをforEach繰り返しにして作成する
      todos.forEach((todo, index) => {
  
        //appendChildを使ってノードを追加する
  const addTask = removeButton => {
    const targetTask = removeButton.('li')
    
  }
  }
        //　リストのli要素内に削除ボタンをつける（document.createElement('button');）完了
  const createDeleteButton = (index) => {
    const creatermoveBtn = docment.createElement('button')
    creatermoveBtn.textContent = "削除";
    creatermoveBtn.addEventListener("click",() => {
      todos.splice(index,1);
     
      //削除をクリックされた時、showTodos()関数で削除する
     
      showTodos(todos);
      todos.reduce((Idnum, todo) => (todo.taskid = Idnum + 1), -1);
      showTodos(todos);
  });
  return creatermoveBtn;
  };
    }
  
    /* todoの内容を削除する */
    // Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
    function deleteTodo(index) {
      //   1- todosから対応するtodo情報を削除する
      //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
      //配列名.splice(開始index,削除する要素)
      //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
  
    }
  
  }
  
  /*　実行される関数 */
  todo();
