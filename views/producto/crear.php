
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<h1>Editar producto <?=$pro->nombre_producto?></h1>
	<?php $url_action = base_url."producto/save&id=".$pro->id_producto; ?>
<?php else: ?>
	<h1>Crear nuevo producto</h1>
	<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>

<div class="form_container">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre_producto : '';  ?>" />

		<label for="descripcion">Descripción</label>
		<textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
		<label for="precio">Precio</label>
		<input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>"/>

		<label for="stock">Stock</label>
		<input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"/>
		
        <label for="oferta">Oferta</label>
		<input type="text" name="oferta" value="<?=isset($pro) && is_object($pro) ? $pro->oferta : ''; ?>"/>

		<label for="fecha">Fecha</label>
		<input type="date" name="fecha" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"/>
                
        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>    
        <select name="categoria">
            <?php while($cat = $categorias->fetch_object()): ?>
                <option value="<?=$cat->id_categoria?>" <?=isset($pro) && is_object($pro) && $cat->id_categoria == $pro->id_categoria ? 'selected' : ''; ?>>

                    <?=$cat->nombre_categoria?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
		<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
			<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/> 
		<?php endif; ?>

        <input type="file" name="imagen" />     

        <input type="submit" value="Guardar" />

    </form>
</div>