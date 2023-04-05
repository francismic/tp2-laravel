
<?php $__env->startSection('title', 'Blog List'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
    
    <?php $lang = session()->get('locale') ?>
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                <?php echo app('translator')->get('blog.titre_blog'); ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <?php echo app('translator')->get('blog.text_blog'); ?>
                    </div>
                    <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><a href="<?php echo e(route('blog.show', $blog->id)); ?>"><?php echo e($blog->title); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li>Aucun article de blog disponible</li>
                    <?php endif; ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-success"><?php echo app('translator')->get('blog.text_add'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/blog/index.blade.php ENDPATH**/ ?>