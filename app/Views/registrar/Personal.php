<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="col py-3 px-5">
            <div class="container">
                <h4 class="title">Registar Personal</h4>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <form action="registrar-personal" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="primer-nombre" class="form-label">Primer nombre</label>
                            <input type="text" class="form-control" id="primer-nombre" name="primer-nombre"> 
                        </div>
                        <div class="col-md-6">
                            <label for="segundo-nombre" class="form-label">Segundo nombre</label>
                            <input type="text" class="form-control" id="segundo-nombre" name="segundo-nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="primer-apellido" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="primer-apellido" name="primer-apellido"> 
                        </div>
                        <div class="col-md-6">
                            <label for="segundo-apellido" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segundo-apellido" name="segundo-apellido">
                        </div>
                        <div class="mb-3">
                            <label for="ci" class="form-label">CI</label>
                            <input type="text" class="form-control" id="ci" name="ci">
                        </div>
                        <div class="mb-4">
                            <label for="tipos" class="form-label">Tipo</label>
                            <select class="form-select" aria-label="Default select example" name="tipo">
                                <option selected>Seleccione un tipo</option>
                                <?php foreach($exito['tipos'] as $tipo){ ?>
                                    <option value="<?php echo($tipo['ID_tipos']) ?>">
                                        <?php echo($tipo['Tipo']) ?>
                                    </option>
                                <?php }; ?>                                
                            </select>
                        </div>

                        <?php if(gettype($exito['res']) === "boolean"){
                                
                                if($exito['res']){ ?>

                                    <div class="alert alert-success" role="alert">
                                        Registrado con exito
                                    </div>

                          <?php }else { ?>

                                    <div class="alert alert-danger" role="alert">
                                        Problemas al registrar personal
                                    </div> 

                          <?php }

                            } ?>
                            
                            <?php if(gettype($exito['res']) === "string"){ ?>

                                    <div class="alert alert-warning" role="alert">
                                        <?php echo ($exito['res']) ?>
                                    </div>

                            <?php } ?>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>