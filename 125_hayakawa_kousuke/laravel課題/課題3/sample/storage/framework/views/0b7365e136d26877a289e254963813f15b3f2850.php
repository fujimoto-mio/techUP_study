<!DOCTYPE html>
  <html lang="ja">
 
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Todo</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <!-- @vite('resources/css/app.css') -->
 
  </head>
 
  <body class="flex flex-col min-h-[100vh]">
      <header class="bg-slate-800">
          <div class="max-w-7xl mx-auto px-4 sm:px-6">
              <div class="py-6">
                  <p class="text-white text-xl">Todoアプリ-編集画面</p>
              </div>
          </div>
      </header>
 
      <main class="grow grid place-items-center">
          <div class="w-full mx-auto px-4 sm:px-6">
              <div class="py-[100px]">
              <form action="/tasks/<?php echo e($task->id); ?>"
    method="post"
    class="inline-block text-gray-500 font-medium"
    role="menuitem" tabindex="-1">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
 
    
    <input type="hidden" name="status" value="<?php echo e($task->status); ?>">
    
 
    <button type="submit"
        class="bg-emerald-700 py-4 w-20 text-white md:hover:bg-emerald-800 transition-colors">完了</button>
</form>
                  <form action="/tasks/<?php echo e($task->id); ?>" method="post" class="mt-10">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>
                      <div class="flex flex-col items-center">
                          <label class="w-full max-w-3xl mx-auto">
                              <input
                                  class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-4 pl-4 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
                                  type="text" name="task_name" value="<?php echo e($task->name); ?>" />
                              <?php $__errorArgs = ['task_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <div class="mt-3">
                                      <p class="text-red-500">
                                          <?php echo e($message); ?>

                                      </p>
                                  </div>
                              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          </label>
 
                          <div class="mt-8 w-full flex items-center justify-center gap-10">
                              <a href="/tasks" class="block shrink-0 underline underline-offset-2">
                                  戻る
                              </a>
                              <button type="submit"
                                  class="p-4 bg-sky-800 text-white w-full max-w-xs hover:bg-sky-900 transition-colors">
                                  編集する
                              </button>
                          </div>
                      </div>
 
                  </form>
 
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
 
  </html><?php /**PATH C:\xampp\htdocs\sample\resources\views/tasks/edit.blade.php ENDPATH**/ ?>