// グローバルの空間に変数や関数をセットしている。（即時関数にしてもよい）
function todo() {
    // 入力したTodoタスクの一覧を保持する配列を定義する
    var todos = [];
    /* HTMLのID値を使ってDOM要素を取得する */
    //  1 テキストボックス(input[type="text"])を要素を取得する。　ここでは、[input-todo-box]
    var input = document.getElementById('input-todo-box');
    //  2 追加ボタン(button要素)を要素を取得する。   　ここでは、[add-button]
    var button = document.getElementById('add-button');
    //  3 Todoリストを一覧表示するul要素を取得する。　ここでは、[todo-list]
    var ul = document.querySelector('#todo-list');


    /*「追加」ボタンがクリックされたときの処理 */
    button.addEventListener('click', (event) => {
        //   テキストボックスに入力されたテキストの値を取り出して、Todoリスト一覧に追加する
        var text = input.value.trim();
        if (text === '') return;
        //   取り出したらテキストボックスの中を空にする
        input.value = '';
        //level3-10 [配列の要素を変更しよう]　push()要素を参考に配列でテキストの値を追加する。
        todos.push(text);
        //showTodos()関数で再表示
        showTodos();
    });

    /* 「todos」の中身を一覧表示する */
    function showTodos() {
        //    - ul要素にli要素(createElement)を追加して、li要素内にtodoタスクの内容を表示する
        ul.innerHTML = '';
        //TodoリストをforEach繰り返しにして作成する
        todos.forEach((todo, index) => {
            var li = document.createElement('li');
            li.textContent = todo;
            //appendChildを使ってノードを追加する

            //　リストのli要素内に削除ボタンをつける（document.createElement('button');）
            var deleteBtn = document.createElement('button');
            deleteBtn.textContent = '削除';
            //削除をクリックされた時、showTodos()関数で削除する
            deleteBtn.addEventListener('click', function () {
                deleteTodo(index);
            });
            li.appendChild(deleteBtn);
            ul.appendChild(li);
        });
    }

    /* todoの内容を削除する */
    // Todo情報を表すli要素(showTodo関数で作成される要素)の中にある削除ボタンをクリックしたら実行される。
    //   1- todosから対応するtodo情報を削除する
    function deleteTodo(index) {
        //   2- 引数はindexを受け取る(インデックス番号) level3-10参考に、ここでは、splice()を使います。
        todos.splice(index, 1);
        //   3- 削除後はshowTodosを実行して、Todoリストを再表示させる
        showTodos();
    }
}
/*　実行される関数 */
todo();