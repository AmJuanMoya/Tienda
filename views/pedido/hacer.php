


<?php


if(isset($_SESSION['identity'])):?>

<h1> Hacer pedido</h1>


<p>
    <a href="<?=base_url?>carrito/index">Ver productos del Pedido</a>
    <br>

    <h3>Direccion de Envio</h3>
    <form action="<?=base_url.'pedido/add'?>" method="POST" >

    <label for="ciudad">Ciudad</label>
    <input type="text" name="ciudad" require>

    <label for="direccion">dirección</label>
    <input type="text" name="direccion" require>

    <input type="submit" value="confirmar">

    </form>


</p>

<?php else :?>

    <h1>Necesita estar identificado</h1>
    <p>Nececitas Iniciar sesion para poder hacer un pedido</p>

    
<?php endif ;?>
