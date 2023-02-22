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
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Nombres</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Apellidos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
                            <label class="form-check-label" for="inlineCheckbox2">CI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Tipo</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
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
                                <?php foreach($personal as $per){ ?>
                                    <tr class="">
                                        <td scope="row"> <?php echo($per['ID_personal']); ?> </td>
                                        <td> <?php echo($per['Nombre']); ?> </td>
                                        <td> <?php echo($per['Apellido']); ?> </td>
                                        <td> <?php echo($per['CI']); ?> </td>
                                        <td> <?php echo($per['Tipo']); ?> </td>
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