<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link  href="/Assets/AmTiendaLogo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="Assets/Favicon.jpg">

    <title>Tienda</title>
</head>
<body>
    <div class="app">   
    <header> <!--Encabezado-->
    <img class="Logo" src="Assets/AmTiendaLogo.jpg" alt="Logo de Am">   <!--Imagen/logotipo del encabezado -->
    <h1> Tienda De <span>AM</span> </h1>
    </header>
    
    <nav class="app_nav"> <!-- Barra de navegacion -->
        <ul>
            <li><a href="#">INICIO</a></li>
            <li><a href="#">Blusas</a></li>
            <li><a href="#">Camisetas</a></li>
            <li><a href="#">Camisas</a></li>
            <li><a href="#">Pantalones</a></li>
        </ul>
    </nav>
    
    <main><!-- Contenido principal de la pagina -->
       
        <aside>  <!-- Barra lateral para el formulario -->
        <div class="content_aside">
            <section>
                <h2>Mi Carrito</h2>
                <ul>
                    <li><span class="data">Productos</span> <span class="bold"> 0</span></li>
                    <li><span class="data">Total</span> <span class="bold"> 0$</span></li>
                    <li><a class="link_carrito" href="#">Ver el Carrito</a></li>
                </ul>

            </section>
            
            <form action="sumbit">     <!-- Formulario.... -->
                <h2>Entrar a la web</h2>
                
                   <fieldset>  <legend>Correo</legend>
                    <input type="email" placeholder="example@gmail.com"> 
                   </fieldset>
                       
                    <fieldset> <legend>Contraseña</legend>
                        <input type="password">
                    </fieldset>
                     
                <input type="submit">

                <div>
                    <a class="Link_register" href="#">Registrate aqui</a>
                    <hr>
                </div>

                <div>
                    <ul class="menu_ul">
                        <li class="link_menu"><a href="#">Mis Pedidos </a></li>
                        <li class="link_menu"><a href="#">Gestionar Pedidos </a></li>
                        <li class="link_menu"><a href="#">Gestionar Categorias </a></li>
                    </ul>


                </div>




            </form>
        </div>
        </aside>

        <section class="contenido" > <!--Seccion para el contenido del "Carrito"-->
            <h3>Algunos de nuestros productos</h3>
            <hr>

        </section>


    </main>

    <footer> <!--Pie de Pagina-->

        <p> Desarrollado por AM. Juan Moya &copy; <?= date("Y") ?> </p>

        
    </footer>



</div>

</body>
</html>