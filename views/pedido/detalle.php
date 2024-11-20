<h1>Detalle del pedido</h1>

<?php if(isset($pedido)): ?>
    <?phpif(isset($_SESSION['admin'])): ?>
    


    <h3>Cambiar estado</h3>

    <form action="<?=base_url?>Pedido/estado" method="POST">
        <input type="hidden" value="<?=$pedido->id_pedido?>" name="pedido_id" />
        <select name="estado" id="">
            <option value="<?=$pedido->estado?>"><?=Utils::showStatus($pedido->estado) ?></option>
            <option value="confirm">Pendiente</option>
            <option value="preparation">En preparacion</option>
            <option value="ready">Listo para enviar</option>
             <option value="sended">Enviado</option>
        </select>
        <input type="submit" value="Cambiar estado">
    </form>
    <br/>
    <h3>Datos del cliente</h3>


    Ciudad:<?=$pedido->ciudad?> <br/>
    Direccion:<?=$pedido->direccion?> <br/>
    <br/>
    
    <h3>Datos del pedido</h3>

    Estado:  <?=Utils::showStatus($pedido->estado)  ?> <br/>
    Número del pedido: <?=$pedido->id_pedido?> <br/>
    Total a pagar:<?=$pedido->costo?> <br/>
    <br/>
    Productos:
    <br/>
    <table id="tabla_gestion">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>

    <?php while($producto = $productos->fetch_object()): ?>

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
                <?=$producto->unidades?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

<?php endif; ?>



