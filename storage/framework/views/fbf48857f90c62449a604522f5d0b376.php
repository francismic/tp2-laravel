<?php $__env->startSection('title', 'Welcome'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                    <?php echo e(config ('app.name')); ?>

                </div>
                <p>
                    <a href="<?php echo e(route('etudiant.index')); ?>">Voir la liste des étudiants</a>
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/welcome.blade.php ENDPATH**/ ?>