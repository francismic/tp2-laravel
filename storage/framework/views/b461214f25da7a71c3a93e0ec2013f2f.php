
<?php $__env->startSection('title', 'Modifier un étudiant'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-4">

<?php $lang = session()->get('locale') ?>
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3><?php echo app('translator')->get('etudiant.titre_edit'); ?></h3>
                        <p><?php echo app('translator')->get('etudiant.text_edit'); ?></p>
                        <form action="" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                            <div class="col-md-12 mt-4">
                               <input class="form-control" type="text" name="nom" value="<?php echo e($etudiant ->nom); ?>">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="text" name="adresse" value="<?php echo e($etudiant ->adresse); ?>">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="tel" name="phone" value="<?php echo e($etudiant ->phone); ?>">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="email" name="email" value="<?php echo e($etudiant ->email); ?>">
                            </div>

                            <div class="col-md-12 mt-4">
                                <input class="form-control" type="date" name="birthday" value="<?php echo e($etudiant ->birthday); ?>">
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="villeId" required>
                                      <option selected value="<?php echo e($etudiant->etudiantHasVille->id); ?>"><?php echo e($etudiant->etudiantHasVille->nom); ?></option>
                                      <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ville->id); ?>"><?php echo e($ville->nom); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>
                           </div>

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary"><?php echo app('translator')->get('etudiant.text_modifier'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/etudiant/edit.blade.php ENDPATH**/ ?>