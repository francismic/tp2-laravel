
<?php $__env->startSection('title', 'Create'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    
    <?php $lang = session()->get('locale') ?>
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                <?php echo app('translator')->get('blog.titre_add'); ?>
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                                <?php if($errors->any()): ?>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="text-danger"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
                <div class="card">
                    <form  action="<?php echo e(route('blog.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-tab-pane" type="button" role="tab" aria-controls="en-tab-pane" aria-selected="true">English</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="fr-tab" data-bs-toggle="tab" data-bs-target="#fr-tab-pane" type="button" role="tab" aria-controls="fr-tab-pane" aria-selected="false">Français</button>
                        </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="en-tab-pane" role="tabpanel" aria-labelledby="en-tab" tabindex="0">
                                <div class="col-12 mt-4">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="body"></textarea>
                                </div>

                                </div>
                        <div class="tab-pane fade" id="fr-tab-pane" role="tabpanel" aria-labelledby="fr-tab" tabindex="0">
                                
                                <div class="col-12 mt-4">
                                    <label for="title_fr">Titre du message</label>
                                    <input type="text" id="title_fr" name="title_fr" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label for="message_fr">Texte</label>
                                    <textarea class="form-control" id="message_fr" name="body_fr"></textarea>
                                </div>

                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="<?php echo app('translator')->get('blog.text_add'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/blog/create.blade.php ENDPATH**/ ?>