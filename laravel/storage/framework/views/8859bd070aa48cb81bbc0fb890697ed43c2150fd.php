
<title>Editar Categoría</title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="<?php echo e(route('categorias.actualizar', $categoria->id_categorias)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="nombre" class="form-control bg-secondary text-light border-0" value="<?php echo e($categoria->nombre); ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" class="form-control bg-secondary text-light border-0" required><?php echo e($categoria->descripcion); ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="<?php echo e(route('gest_admin.manager')); ?>" class="btn btn-danger mx-2">Cancelar</a>
    </form>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/modifyCategories.blade.php ENDPATH**/ ?>