
<?php $__env->startSection('title', 'Post'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
    
    <?php $lang = session()->get('locale') ?>
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                <?php echo e($blogPost->title); ?>

                </div>
                <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session('success')); ?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h3>English Text</h3>
                <p>
                <?php echo $blogPost->body; ?>

                </p>

                <hr>

                <h3>Article en Francais</h3>

                <?php if($blogPost->title_fr === null && $blogPost->body_fr === null): ?>
                <p>Aucune traduction disponible</p>
                <?php else: ?>
                <p>
                <?php echo $blogPost->body_fr; ?>

                </p>
                <?php endif; ?>

                <p>
                    <strong>Author : </strong> 
                    <?php if(isset($blogPost->blogHasUser)): ?>
                        <?php echo e($blogPost->blogHasUser->name); ?>

                    <?php endif; ?>

                    
                </p>
                <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('blog.text_return'); ?></a>
            </div>
        </div>
        <div class="row mt-2">
            <hr>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $blogPost)): ?>
            <div class="col-6">
                <a href="<?php echo e(route('blog.edit', $blogPost->id)); ?>" class="btn btn-success btn-sm"><?php echo app('translator')->get('blog.text_update'); ?></a>
            </div>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $blogPost)): ?>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <?php echo app('translator')->get('blog.text_delete'); ?>
                </button>
            </div>
            <?php endif; ?>
        </div>

    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('blog.titre_delete'); ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo app('translator')->get('blog.text_confirm'); ?> <?php echo e($blogPost->title); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('blog.text_return'); ?></button>
        <form action="<?php echo e(route('blog.delete', $blogPost->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" class="btn btn-danger" value="<?php echo app('translator')->get('blog.text_delete'); ?>">
         </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/blog/show.blade.php ENDPATH**/ ?>