<?php if(isset($categoria)): ?>
    <h1><?=$categoria->nombre_categoria?></h1>
    
    <!-- si no hay productos -->
    <?php if($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>

        <?php while($product = $productos->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>producto/ver&id=<?=$product->id_producto?>">
                    <?php if($product->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/ferretaria.PNG" />
                    <?php endif; ?>
                    <h2><?=$product->nombre_producto?></h2>
                    <p><?=$product->precio?></p>
                    <a href="<?=base_url?>carrito/add&id=<?=$product->id_producto?>" class="button">Comprar</a>
                </a>
            </div>
        <?php endwhile; ?>

    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>