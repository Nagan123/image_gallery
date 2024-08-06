<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Image Gallery</h1>
        <a href="<?php echo e(route('images.create')); ?>" class="btn btn-primary mb-3">Upload Image</a>
        <div class="row">
           
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img src="<?php echo e(asset('storage/' . $image->image_url)); ?>" class="card-img-top" alt="<?php echo e($image->title); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($image->title); ?></h5>
                                    <p class="card-text"><?php echo e($image->tag); ?></p>
                                    <a href="<?php echo e(route('images.show', $image->id)); ?>" class="btn btn-info">View</a>
                                    <a href="<?php echo e(route('images.edit', $image->id)); ?>" class="btn btn-warning">Edit</a>
                                    <form action="<?php echo e(route('images.destroy', $image->id)); ?>" method="POST" style="display:inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\gallery\resources\views/images/index.blade.php ENDPATH**/ ?>