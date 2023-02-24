<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>
  
<?php include("../sistema-roscio/app/Views/templates/sidebar.php"); ?>
    
        <div class="col py-3 px-5">
            <div class="container">
                <h4 class="title">Registar Salida del Personal</h4>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <form action="registrar-salida" method="post">
                        <div class="mb-3">
                            <label for="tipo" class="form-label">CI del Personal</label>
                            <input type="text" class="form-control" id="tipo" name="ci" required> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Observación</label>
                            <textarea class="form-control textarea" id="exampleFormControlTextarea1" rows="4" name="observacion"></textarea>
                        </div>
                      <?php if(gettype($exito['res']) === "boolean"){
                                
                                if($exito['res']){ ?>

                                    <div class="alert alert-success" role="alert">
                                        Registrado con exito
                                    </div>

                          <?php }else { ?>

                                    <div class="alert alert-danger" role="alert">
                                        Problemas al registrar salida
                                    </div> 

                          <?php }

                            } ?>
                            
                            <?php if(gettype($exito['res']) === "string"){ ?>

                                    <div class="alert alert-warning" role="alert">
                                        <?php echo ($exito['res']) ?>
                                    </div>

                            <?php } ?>

                        <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>