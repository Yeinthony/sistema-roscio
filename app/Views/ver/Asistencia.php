<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="container-md col py-3 px-5">
            <div class="container mb-5">
                <h4 class="title">Ver Asistencia</h4>
            </div>
            <div class="container-formBuscar">
                <div class="formBuscar">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="buscar-asistencia" name="buscar-asistencia">
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
                            <input class="form-check-input" type="checkbox" id="check-nombre" value="check-fecha">
                            <label class="form-check-label" for="check-nombre">Nombre</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check-ci" value="check-ci" checked>
                            <label class="form-check-label" for="check-ci">CI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check-fecha" value="check-fecha">
                            <label class="form-check-label" for="check-fecha">Fecha</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="check-tipo" value="check-fecha">
                            <label class="form-check-label" for="check-tipo">Tipo</label>
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
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Salida</th>
                                    <th class="col-sm-2" scope="col" >Observación</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($registro as $reg){ ?>
                                    <tr class="">
                                        <td scope="row"> <?php echo($reg['Fecha']); ?> </td>
                                        <td> <?php echo($reg['primer_nombre']." ".$reg['primer_apellido']); ?> </td>
                                        <td> <?php echo($reg['CI']); ?> </td>
                                        <td> <?php echo($reg['hora_entrada']); ?>  </td>
                                        <td> <?php echo($reg['hora_salida']); ?>  </td>
                                        <td> <?php echo($reg['observacion']); ?> </td>
                                        <td> 
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropEd<?php echo($reg['ID_registro']); ?>">
                                                Editar
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo($reg['ID_registro']); ?>">
                                                Eliminar
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="staticBackdropEd<?php echo($reg['ID_registro']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="editar-asistencia" method="post">
                                                            <div class="mb-3">
                                                                <label for="id-registro" class="form-label">ID</label>
                                                                <input type="text" class="form-control" id="id-registro" value="<?php echo($reg['ID_registro']); ?>" name="id-registro" readonly> 
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleFormControlTextarea1" class="form-label">Observación</label>
                                                                <input type="text" class="form-control textarea" id="exampleFormControlTextarea1" rows="4" value="<?php echo($reg['observacion']); ?>" name="observacion"></input>
                                                            </div>

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Eliminar -->
                                    <div class="modal fade" id="staticBackdrop<?php echo($reg['ID_registro']); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo("¿Esta seguro que desea eliminar el registro del ".$reg['Fecha']." para ".$reg['primer_nombre']." ".$reg['primer_apellido'])."?"; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="eliminar-registro?id-registro=<?php echo($reg['ID_registro']); ?>" class="btns btnEliminar">
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

let $checkboxNombre = document.getElementById('check-nombre');
let $checkboxCI = document.getElementById('check-ci');
let $checkboxFecha = document.getElementById('check-fecha');
let $checkboxTipo = document.getElementById('check-tipo');
let $input = document.getElementById('buscar-asistencia');

document.addEventListener("change", ()=>{

    if($checkboxNombre.checked){
        $checkboxCI.checked = false;
        $checkboxFecha.checked = false;
        $checkboxTipo.checked = false;
    }

    if($checkboxCI.checked){
        $checkboxNombre.checked = false;
        $checkboxFecha.checked = false;
        $checkboxTipo.checked = false;
    }

    if($checkboxFecha.checked){
        $input.type = "date";
        $checkboxNombre.checked = false;
        $checkboxCI.checked = false;
        $checkboxTipo.checked = false;
    }else{
        $input.type = "text";
    }

    if($checkboxTipo.checked){
        $checkboxNombre.checked = false;
        $checkboxCI.checked = false;
        $checkboxFecha.checked = false;
    }

});


</script>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>