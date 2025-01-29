<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="container">
        <p style="font-size: 20px;">Este es el panel de control del administrador!</p>
        <a href="<?php echo e(route('index')); ?>" class="btn btn-dark">Volver a la carta</a>
        <a href="javascript: document.getElementById('logout').submit()" class="btn btn-danger">Cerrar sesion</a>
        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout" style="display:none">
            <?php echo csrf_field(); ?>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Proyecto_Carta_Restaurante_RonyL\laravel\resources\views/gest_admin/manager.blade.php ENDPATH**/ ?>