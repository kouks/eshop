<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>asd</title>
</head>
<body>
    <?php $__currentLoopData = $asd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($num); ?><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
