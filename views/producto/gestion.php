<h1>Gestion de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert_green">El producto NO se ha creado!</strong>
<?php endif;?>

<?php Utils::deleteSession('producto') ?>



<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <strong class="alert_green">El producto NO se ha borrado!</strong>
<?php endif;?>


<?php Utils::deleteSession('delete') ?>


<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>ACCIONES</th>
    </tr>   
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id_producto;?></td>
            <td><?=$pro->nombre_producto;?></td>
            <td><?=$pro->descripcion;?></td>
            <td><?=$pro->precio;?></td>
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id_producto?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id_producto?>" class="button button-gestion button-red">Eliminar</a>
            </td>
       </tr>
    <?php endwhile; ?>

</table>