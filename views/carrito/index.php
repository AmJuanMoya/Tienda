<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?> 



    <a class="button bt-carrito" href="<?=base_url?>carrito/delete_all">Vaciar Carrito</a>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php 
            foreach($carrito as $indice =>$elemento): 
                $producto = $elemento['producto'];
        ?>
    <tr>
            <td>
                <?php if ($producto->imagen != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito"/>
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/ferreteria.png" class="img_carrito"/>
                <?php endif; ?>
            </td>
            <td>
                <!-- <?=$producto->nombre_producto?> -->
                <a href="<?=base_url?>producto/ver&id=<?=$producto->id_producto?>"><?=$producto->nombre_producto?></a>
        
            </td>
            <td>
                <?=$producto->precio?>
            </td>
            <td>

                <?=$elemento['unidades']?>
                <div class="updown">
                <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="button up" >+</a>
                <a href="<?=base_url?>carrito/down&index=<?=$indice?>"class="button down" >-</a>  
                </div>
            </td>

            <td>
            <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button-red" >Eliminar</a>

            </td>
            
                

            
        </tr>
        <?php endforeach; ?>

    </table>

    <br/>

    <div class="total-carrito">
        <?php $stats = Utils:: stadisticCarrito(); ?>
        <h3>Precio total: $<?=$stats['total']?></h3>

        <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>


    </div>

<?php else: ?>
    <p>El carrito esta vacio</p>

<?php endif; ?>



























<style>


.bt-carrito{

background-color: brown;
min-width: 100px;
max-width: 200px;
text-align: center;

}

.button-pedido{

text-align: center;
min-width: 200px;
max-height: 40px;

}

.up:last-child, .down{

    max-width: 10px;
    display: block;
    background-color: red;
}

.updown{
display: flex;
justify-content:space-around;

}

</style>