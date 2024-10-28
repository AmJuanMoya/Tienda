<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
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
            <?=$producto->nombre_producto?>
        </td>
        <td>
            <?=$producto->precio?>
        </td>
        <td>
            <?=$elemento['unidades']?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<br/>

<?php $stats = Utils::stadisticCarrito();?>

<div class="tot">

<h3>Precio total:$ <?=$stats['total']?></h3>
<a href= "<?=base_url?>pedido/hacer" class="button">Hacer pedido</a>

</div>





<style>

.tot a{
    background-color: #3498db;
    width: 20%;
    text-align: center;
}


.tot{
    /* border: red 1px solid; */
    display: flex;
    padding:  20px;
    justify-content:  space-between;
}



</style>