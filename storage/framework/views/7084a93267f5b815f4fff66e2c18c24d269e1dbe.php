<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Details</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo e($image->title); ?></h1>
        <div class="card mb-4">
            <img src="<?php echo e(asset('storage/' . $image->image_url)); ?>" class="card-img-top" alt="<?php echo e($image->title); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($image->tag); ?></h5>
                <p class="card-text"><?php echo e($image->description); ?></p>
                <a href="<?php echo e(route('images.edit', $image->id)); ?>" class="btn btn-warning">Edit</a>
                <form action="<?php echo e(route('images.destroy', $image->id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <a href="<?php echo e(route('images.index')); ?>" class="btn btn-primary">Back to Gallery</a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\gallery\resources\views/images/show.blade.php ENDPATH**/ ?>