
<?php if(isset($edit) && isset($cat) && is_object($cat)): ?>
	<h1>Editar categoria <?=$cat->nombre?></h1>
	<?php $url_action = base_url."categoria/save&id=".$cat->id_categoria; ?>
<?php else: ?>
	<h1>Crear nueva categoria</h1>
	<?php $url_action = base_url."categoria/save"; ?>
<?php endif; ?>



<form action="<?=$url_action?>" method="POST">
    <label for="categoria">Categoria</label>
    <!-- <input type="text" name="categoria" required /> -->
    <input type="text" name="nombre" value="<?=isset($cat) && is_object($cat) ? $cat->nombre : '';  ?>" />

    <input type="submit" value="Guardar" />
</form>