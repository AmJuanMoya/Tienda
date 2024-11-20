<?php
    if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): 
?>

    <h1>Tu pedido se ha confirmado!</h1>

    <p>
        Tu pedido ha sido guardado con éxito, una vez que hayas realizado 
        la transferencia bancaria con el costo del pedido. será procesado y enviado!.
    </p>

    <br/>

    <!--Si existe pedido-->

    <?php if(isset($pedido)): ?>
        <h3>Datos del pedido:</h3>

        Número del pedido: <?=$pedido->id_pedido?> <br/>
        Total a pagar: <?=$pedido->costo?> <br/>
        <br/>
        Productos:
        <br/>
        <table>
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
                        $<?=$producto->precio?>
                    </td>
                    <td>
                        <?=$producto->unidades?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

<?php
    elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): 
?>

    <h1>Tu pedido NO ha confirmado!</h1>

<?php
    endif; 
?>
