<!-- resources/views/test-form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
</head>
<body>
    <form action="<?php echo e(url('/register')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- First Name -->
        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" value="<?php echo e(old('first')); ?>" required>
        <?php if($errors->has('first')): ?>
            <div style="color: red;"><?php echo e($errors->first('first')); ?></div>
        <?php endif; ?>
        <br>

        <!-- Last Name -->
        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" value="<?php echo e(old('last')); ?>" required>
        <?php if($errors->has('last')): ?>
            <div style="color: red;"><?php echo e($errors->first('last')); ?></div>
        <?php endif; ?>
        <br>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
        <?php if($errors->has('email')): ?>
            <div style="color: red;"><?php echo e($errors->first('email')); ?></div>
        <?php endif; ?>
        <br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <?php if($errors->has('password')): ?>
            <div style="color: red;"><?php echo e($errors->first('password')); ?></div>
        <?php endif; ?>
        <br>

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <?php if($errors->has('password_confirmation')): ?>
            <div style="color: red;"><?php echo e($errors->first('password_confirmation')); ?></div>
        <?php endif; ?>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php /**PATH /var/www/resources/views/welcome.blade.php ENDPATH**/ ?>