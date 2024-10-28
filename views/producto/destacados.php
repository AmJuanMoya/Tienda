<h1>Algunos de nuestros productos</h1>

<?php while($product = $productos->fetch_object()): ?>
    <div class="product">
        <a href="<?=base_url?>producto/ver&id=<?=$product->id_producto ?>">
            <?php if($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
            <?php else: ?>
                <img src="<?=base_url?>assets/img/Manzana-A1.png" />
            <?php endif; ?>
            <h2><?=$product->nombre_producto?></h2>
            <p><?=$product->precio?></p>
            <a href="#" class="button">Comprar</a>
        </a>
    </div>
<?php endwhile; ?>


