<!-- resources/views/create_post.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Create Post</h1>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('post.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo e(old('user_id')); ?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo e(old('price')); ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo e(old('description')); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="user_first_name" class="form-label">User First Name</label>
            <input type="text" class="form-control" id="user_first_name" name="user_first_name" value="<?php echo e(old('user_first_name')); ?>">
        </div>
        <div class="mb-3">
            <label for="user_last_name" class="form-label">User Last Name</label>
            <input type="text" class="form-control" id="user_last_name" name="user_last_name" value="<?php echo e(old('user_last_name')); ?>">
        </div>
        <div class="mb-3">
            <label for="user_email" class="form-label">User Email</label>
            <input type="email" class="form-control" id="user_email" name="user_email" value="<?php echo e(old('user_email')); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\Users\macbl\Desktop\project\kleapi2\resources\views/create_post.blade.php ENDPATH**/ ?>