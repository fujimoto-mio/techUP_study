<!DOCTYPE html>
<html lang="ja">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>テスト</title>
</head>
 
<body>
 
    <?php if($todo_lists->isNotEmpty()): ?>
        <ul>
            <?php $__currentLoopData = $todo_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <?php echo e($item->name); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
 
</body>
 
</html>
<?php /**PATH /Applications/MAMP/htdocs/techUP_study/127_shijyou_ryouhei/testsample/resources/views/todo_list/index.blade.php ENDPATH**/ ?>