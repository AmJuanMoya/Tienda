<?php if(isset($_SESSION['identity'])): ?>

    <h1>Hacer pedido</h1>
    <p>
        <a href="<?=base_url?>carrito/index">Ver productos y precio del pedido</a>
    </p>
    <br/>
    
    <h3> Direccion para el envio:</h3>
    <form action="<?=base_url.'pedido/add'?>" method="POST">

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" required/>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required/>

        <input type="submit" value="confirmar" required/>

    </form>


<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitar estar logueado en la web para poder realizar pedidos</p>

<?php endif;?>