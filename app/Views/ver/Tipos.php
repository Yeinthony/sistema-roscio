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
                <div class="card-body container-table">
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
                                <?php foreach($res['tipos'] as $tipo){ ?>
                                    <tr class="">
                                        <td scope="row"> <?php echo($tipo['ID_tipos']); ?> </td>
                                        <td> <?php echo($tipo['Tipo']); ?> </td>
                                        <td> 
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEd<?php echo($tipo['ID_tipos']); ?>">
                                                Editar
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo($tipo['ID_tipos']); ?>">
                                                Eliminar
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="staticBackdropEd<?php echo($tipo['ID_tipos']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Tipo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="editar-tipos" method="post">
                                                            <div class="mb-3">
                                                                <label for="tipo" class="form-label">ID</label>
                                                                <input type="text" class="form-control" id="tipo" name="id-tipo" readonly value="<?php echo($tipo['ID_tipos']); ?>"> 
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tipo" class="form-label">Tipo</label>
                                                                <input type="text" class="form-control" id="tipo" name="tipo" value="<?php echo($tipo['Tipo']); ?>" required> 
                                                            </div>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Editar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Eliminar -->
                                    <div class="modal fade" id="staticBackdrop<?php echo($tipo['ID_tipos']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Tipo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo("¿Esta seguro que desea eliminar el tipo ".$tipo['Tipo']."? Al hacerlo tambien se eliminara todo el registro asociado."); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="eliminar-tipo?id-tipo=<?php echo($tipo['ID_tipos']) ?>" class="btns btnEliminar">
                                                        Eliminar
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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