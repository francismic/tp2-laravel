
<?php $__env->startSection('title', 'Liste des documents'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
    
    <?php $lang = session()->get('locale') ?>
        <div class="row">
            <div class="col-12 text-center pt-2">
                <div class="display-5 mt-2">
                <?php echo app('translator')->get('doc.titre_doc'); ?>
                </div>
            </div>
        </div>

        <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <?php echo app('translator')->get('doc.text_add'); ?>
                </button>
        </div>
        
        <table class="table table-striped table-dark mt-4">
            <thead>
                <tr>
                    <th scope="col"><?php echo app('translator')->get('doc.text_title'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('doc.text_date'); ?></th>
                    <th scope="col"><?php echo app('translator')->get('doc.text_user'); ?></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($document->title_en); ?></td>
                <td><?php echo e($document->created_at); ?></td>
                <td><?php echo e($document->user->name); ?></td>
                <td>
                    <a href="<?php echo e(route('documents.download', $document->id)); ?>" class="btn btn-primary btn-sm"><?php echo app('translator')->get('doc.text_dl'); ?></a>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $document)): ?>
                    <?php if($document->user_id == auth()->id()): ?>
                    <form action="<?php echo e(route('documents.delete', $document->id)); ?>" method="post" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm"><?php echo app('translator')->get('doc.text_delete'); ?></button>
                    </form>
                    <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php echo $documents->links(); ?>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="container mb-4">
        <h1>Ajouter un document</h1>
        <form action="<?php echo e(route('documents.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="title_en">Title</label>
                <input type="text" class="form-control" id="title_en" name="title_en" required>
            </div>

            <div class="form-group">
                <label for="title_fr">Titre</label>
                <input type="text" class="form-control" id="title_fr" name="title_fr" required>
            </div>

            <div class="form-group">
                <label for="document">Document</label>
                <input type="file" class="form-control-file" id="file_name" name="file_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e2195223\resources\views/documents/index.blade.php ENDPATH**/ ?>