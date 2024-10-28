<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferreteria</title>
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
</head>
<body>
    <div id="container">

        <!--Cabecera-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/ferretaria.PNG" alt="Ferreteria logo" />
                <a href="index.php">Ferreteria</a>
            </div>
        </header>
        <!--Menu-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria1</a>
                </li>
                <li>
                    <a href="#">Categoria2</a>
                </li>
                <li>
                    <a href="#">Categoria3</a>
                </li>
                <li>
                    <a href="#">Categoria4  </a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <!--Barra lateral-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la Web</h3>
                    <form action="#" method="post">
                        <label for="email">Email</label>
                        <input type="email" name="email" />
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" />
                        <input type="submit" value ="Enviar"/>
                    </form>
                    <ul>
                        <li><a href="#">Mis pedidos</a></li>
                        <li><a href="#">Gestionar pedidos</a></li>
                        <li><a href="#">Gestionar categorias</a></li>
                    </ul>
                </div>

            </aside>
            <!--Contenido Central-->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/ferretaria.PNG"   />
                    <h2>Ferreteria </h2>
                    <p>1000 pesos</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/ferretaria.PNG"   />
                    <h2>Ferreteria </h2>
                    <p>1000 pesos</p>
                    <a href="#" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/ferretaria.PNG"   />
                    <h2>Ferreteria </h2>
                    <p>1000 pesos</p>
                    <a href="#" class="button">Comprar</a>
                </div>
            <div class="product">
                    <img src="assets/img/ferretaria.PNG"   />
                    <h2>Ferreteria </h2>
                    <p>1000 pesos</p>
                    <a href="#" class="button">Comprar</a>
                </div>

            </div>
        
        </div>

        <!--Pie de pagina-->
        <footer id="footer">
            <p>Desarrollado por Washington Nieto Web &copy; <?=date('Y')?></p>

        </footer>
    </div>

</body>
</html>