<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="col py-3 px-5">
            <div class="container">
                <h4 class="title">Registar Personal</h4>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres"> 
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos">
                        </div>
                        <div class="mb-3">
                            <label for="ci" class="form-label">CI</label>
                            <input type="text" class="form-control" id="ci">
                        </div>
                        <div class="mb-4">
                            <label for="tipos" class="form-label">Tipo</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un tipo</option>
                                <?php foreach($tipos as $tipo){ ?>
                                    <option value="<?php echo($tipo['ID_tipos']) ?>">
                                        <?php echo($tipo['Tipo']) ?>
                                    </option>
                                <?php }; ?>                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>