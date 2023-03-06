<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="col py-3 px-5">
            <div class="container mb-5">
                <h4 class="title">Ver Personal</h4>
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
                <div class="container-checks mt-4">
                    
                    <div class="checks mt-2">
                        <div class="title-formBuscar form-check form-check-inline">
                            <span>Buscar Por: </span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check-ci" value="check-ci" checked>
                            <label class="form-check-label" for="inlineCheckbox2">CI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check-tipo" value="check-tipo">
                            <label class="form-check-label" for="inlineCheckbox2">Tipo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body container-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($res['personal'] as $per){ ?>
                                    <tr class="">
                                        <td scope="row"> <?php echo($per['ID_personal']); ?> </td>
                                        <td> <?php echo($per['primer_nombre']." ".$per['segundo_nombre']); ?> </td>
                                        <td> <?php echo($per['primer_apellido']." ".$per['segundo_apellido']); ?>  </td>
                                        <td> <?php echo($per['CI']); ?> </td>
                                        <td> <?php echo($per['Tipo']); ?> </td>
                                       <td> 
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEd<?php echo($per['ID_personal']); ?>">
                                                Editar
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo($per['ID_personal']); ?>">
                                                Eliminar
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="staticBackdropEd<?php echo($per['ID_personal']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Personal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="editar-personal" method="post">
                                                            <div class="mb-3">
                                                                <label for="id-personal" class="form-label">ID</label>
                                                                <input type="text" class="form-control" id="id-nombre" name="id-nombre" value="<?php echo($per['ID_personal']); ?>" readonly> 
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="primer-nombre" class="form-label">Primer nombre</label>
                                                                <input type="text" class="form-control" id="primer-nombre" name="primer-nombre" value="<?php echo($per['primer_nombre']); ?>" required> 
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="segundo-nombre" class="form-label">Segundo nombre</label>
                                                                <input type="text" class="form-control" id="segundo-nombre" name="segundo-nombre" value="<?php echo($per['segundo_nombre']); ?>" >
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="primer-apellido" class="form-label">Primer Apellido</label>
                                                                <input type="text" class="form-control" id="primer-apellido" name="primer-apellido" value="<?php echo($per['primer_apellido']); ?>" required> 
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="segundo-apellido" class="form-label">Segundo Apellido</label>
                                                                <input type="text" class="form-control" id="segundo-apellido" name="segundo-apellido" value="<?php echo($per['segundo_apellido']); ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="ci" class="form-label">CI</label>
                                                                <input type="text" class="form-control" id="ci" name="ci" value="<?php echo($per['CI']); ?>" required>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="tipos" class="form-label">Tipo</label>
                                                                <select class="form-select" aria-label="Default select example" name="tipo" required>
                                                                    <?php foreach($res['tipos'] as $tipo){ ?>
                                                                        <option value="<?php echo($tipo['ID_tipos']) ?>" <?php 
                                                                            if($tipo['Tipo'] === $per['Tipo']){ ?> selected <?php } 
                                                                        ?>>
                                                                            <?php echo($tipo['Tipo']) ?>
                                                                        </option>
                                                                    <?php }; ?>                                
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Eliminar -->
                                    <div class="modal fade" id="staticBackdrop<?php echo($per['ID_personal']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Personal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo("¿Está seguro que desea eliminar a ".$per['primer_nombre']." ".$per['primer_apellido']." como personal? Al hacerlo tambien se eliminara todo el registro de asistencia asociado."); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="eliminar-personal?id-personal=<?php echo($per['ID_personal']) ?>" class="btns btnEliminar">
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

<script>

let $checkboxCI = document.getElementById('check-ci');;
let $checkboxTipo = document.getElementById('check-tipo');

document.addEventListener("change", ()=>{

    if($checkboxCI.checked){
        $checkboxTipo.checked = false;
    }

    if($checkboxTipo.checked){
        $checkboxCI.checked = false;
    }

});


</script>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>