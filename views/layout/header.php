<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Am Tineda</title>
    <link rel="icon" href="<?=base_url?>assets/img/am_logo_s2.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">   
</head>
<body>
    <div id="container">

        <!--Cabecera-->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/ferretaria.PNG" alt="Ferreteria logo" />
                <a href="<?=base_url?>">Am Store</a>
            </div>
        </header>
        <!--Menu-->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
                <?php while($cat = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?=base_url?>categoria/ver&id=<?=$cat->id_categoria?>"><?=$cat->nombre_categoria?></a> 

                    </li>
                <?php endwhile; ?>
            </ul>
        </nav>
        <div id="content">



        <style>
        #header{
            background-image: url('<?=base_url?>assets/img/Portada-Manzanas-azules.jpg'); /* Ruta de la imagen */
            background-size: fit; /* Asegura que la imagen cubra toda la pantalla */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-position: center; /* Centra la imagen */
        }
    </style>