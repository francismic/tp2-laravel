
<?php $__env->startSection('title', 'Page de connexion'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

  <?php $lang = session()->get('locale') ?>
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5"><?php echo app('translator')->get('auth.text_login'); ?></h5>
            <form method="post">
            <?php echo csrf_field(); ?>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput"><?php echo app('translator')->get('auth.text_email'); ?></label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword"><?php echo app('translator')->get('auth.text_password'); ?></label>
              </div>

              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit"><?php echo app('translator')->get('auth.text_login'); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/auth/login.blade.php ENDPATH**/ ?>