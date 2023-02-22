<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="col py-3 px-5">
            <div class="container mb-5">
                <h4 class="title">Ver Tipos</h4>
            </div>
            <div class="container-formBuscar">
                <div class="formBuscar">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">
                            Buscar
                            <i class="fa-solid fa-magnifying-glass"></i> 
                        </button>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="table-responsive-">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tipos as $tipo){ ?>
                                    <tr class="">
                                        <td scope="row"> <?php echo($tipo['ID_tipos']); ?> </td>
                                        <td> <?php echo($tipo['Tipo']); ?> </td>
                                        <td> 
                                            <a href="#" class="btns btnEditar">
                                                Editar
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="#" class="btns btnEliminar">
                                                Eliminar
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>