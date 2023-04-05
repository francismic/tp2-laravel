
<?php $__env->startSection('title', 'Info étudiants'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5">

<?php $lang = session()->get('locale') ?>
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-2 text-center">
                <div class="row">
                    <div class="col-md-7 border-right no-gutters">
                        <div class="py-3"><img src="<?php echo e(url('/img/profil.jpg')); ?>" width="100" class="rounded-circle">
                            <h4 class="text-secondary"><?php echo e($etudiant->nom); ?></h4>
                            <div class="stats">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column"> <strong class="text-left head"><?php echo app('translator')->get('etudiant.text_dob'); ?></strong> <span class="text-left bottom"><?php echo e($etudiant->birthday); ?></span> </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column"> <strong class="text-left head"><?php echo app('translator')->get('etudiant.text_ville'); ?></strong> <span class="text-left bottom"><?php echo e($etudiant->etudiantHasVille->nom); ?></span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                <div class="row mt-2">
                                    <div class="col-6"> 
                                    <a href="<?php echo e(route('etudiant.edit', $etudiant->id)); ?>" class="btn btn-success btn"><?php echo app('translator')->get('etudiant.text_modifier'); ?></a>
                                </div>
                                <div class="col-6">
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo app('translator')->get('etudiant.text_effacer'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-4">
                        <div class="py-3">
                            <div> <strong class="d-block head"><?php echo app('translator')->get('etudiant.text_adresse'); ?></strong> <span class="bottom"><?php echo e($etudiant->adresse); ?></span> </div>
                            <div class="mt-4"> <strong class="d-block head"><?php echo app('translator')->get('etudiant.text_phone'); ?></strong> <span class="bottom"><?php echo e($etudiant->phone); ?></span> </div>
                            <div class="mt-4"> <strong class="d-block head"><?php echo app('translator')->get('etudiant.text_email'); ?></strong> <span class="bottom"><?php echo e($etudiant->email); ?></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo app('translator')->get('etudiant.titre_effacer'); ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo app('translator')->get('etudiant.text_msgEffacer'); ?><strong><?php echo e($etudiant->nom); ?></strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('etudiant.text_annuler'); ?></button>
        <form action="<?php echo e(route('etudiant.delete', $etudiant->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <input type="submit" class="btn btn-danger" value="<?php echo app('translator')->get('etudiant.text_effacer'); ?>">
            </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/etudiant/show.blade.php ENDPATH**/ ?>