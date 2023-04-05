<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet" >
    </head>

    <body>
        <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
  
   <?php $lang = session()->get('locale') ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <?php if(auth()->guard()->guest()): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./"><?php echo app('translator')->get('nav.text_login'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('etudiant.create')); ?>"><?php echo app('translator')->get('nav.text_inscription'); ?></a>
        </li>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('blog.index')); ?>"><?php echo app('translator')->get('nav.text_blog'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('documents.index')); ?>"><?php echo app('translator')->get('nav.text_doc'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('etudiant.show', $etudiant->id)); ?>"><?php echo app('translator')->get('nav.text_compte'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('logout')); ?>">Logout</a>
        </li>
        <?php endif; ?>
        <a class="nav-link <?php if($lang=='fr'): ?> text-info <?php endif; ?>" href="<?php echo e(route('lang', 'fr')); ?>">Français <i class="flag flag-french-guiana"></i></a>
        <a class="nav-link <?php if($lang=='en'): ?> text-info <?php endif; ?>" href="<?php echo e(route('lang', 'en')); ?>">English <i class="flag flag-united-states"></i></a>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <?php echo $__env->yieldContent('content'); ?>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"  crossorigin="anonymous"></script>

</html><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/layouts/app.blade.php ENDPATH**/ ?>