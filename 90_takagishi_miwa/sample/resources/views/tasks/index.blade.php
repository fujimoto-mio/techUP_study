<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
     @vite('resources/css/app.css') 
</head>
 
<body class="flex flex-col min-h-[100vh]">
    <header class="bg-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="py-6">
                <p class="text-white text-xl">Todoアプリ</p>
            </div>
        </div>
    </header>
    
  <main class="grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-[100px]">
            <p class="text-2xl font-bold text-center">今日は何する？</p>
            <!-- ここのフォームで　tasksのデータpostで、Controllerに送ってます。 -->
            <form action="/tasks" method="post" class="mt-10">
                @csrf
                <div class="flex flex-col items-center">
                <label class="w-full max-w-3xl mx-auto">
                        <input
                   
                            class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                            placeholder="何かをする..." type="text" name="task_name" /><!-- 送られるデータです -->

                           
                            
                          @error('task_name')
                                    <div class="mt-3">
                                         <p class="text-red-500">
                                             {{ $message }}
                                         </p>
                                                    </div>      
                    </label>
 
                    <button type="submit" class="mt-8 p-4 bg-slate-800 text-white w-full max-w-xs hover:bg-slate-900 transition-colors">   

                    </button>
                </div>
 
            </form>
//ここにいろいろ記載
    </div>
    </div>
</main>
    <footer class="bg-slate-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="py-4 text-center">
            <p class="text-white text-sm">Todoアプリ</p>
        </div>
    </div>
    </footer>
</body>    

 
</html>