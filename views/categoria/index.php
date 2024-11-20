<h1>Gestionar Categorias</h1>

<div class="categoria">
    <a href="<?=base_url?>categoria/crear" class="button button-small">
        Crear categoria
    </a>


    <table>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>           ACCIONES</th>
        </tr>   
        <?php while($cat = $categorias->fetch_object()): ?>
            <tr>

                <td><?=$cat->id_categoria;?></td>
                <td><?=$cat->nombre_categoria;?></td>


                    <td>
                        <a href="<?=base_url?>categoria/editar&id=<?=$cat->id_categoria?>">
                            <button class="btn edit-btn">
                                <i class="fas fa-edit"></i> Editar
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id_categoria?>">
                            <button class="btn delete-btn">
                                <i class="fas fa-trash-alt"></i> Borrar
                            </button>  
                        </a>
                    </td>

            </tr>
        <?php endwhile; ?>

    </table>
</div>