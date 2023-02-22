<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>

    <header class="navbar-header">
        <div href="#inicio" id="logoEv" class="logo">
            <img class="logo-navbar" src="<?php base_url() ?>assets/images/log.png" alt='Logo'/>
        </div>        
        <nav class="nav-bar">
            <a href="http://localhost/sistema-roscio/indexView">Home</a>
            <a href="http://localhost/sistema-roscio/login">Login</a>
        </nav>
    </header>

    <div class="container-login">
        <div class="container-logo">
            <img src="<?php base_url() ?>assets/images/log1.png" alt="Logo Roscio">
        </div>
       <div class="formulario">
            <form action="login" method="post">
                <div class="mb-5 mt-3">
                    <h3>LOGIN</h3>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-input" id="user-form" name="user-form" placeholder="Usuario">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-input" id="pass-form" name="pass-form" placeholder="Contraseña">
                </div>
                <div class="mb-4 d-grid gap-2">
                    <button class="btn-ingresar" type="submit">INGRESAR</button>
                </div>
            </form>
       </div>
    </div>

    <script>
        let mensaje =  '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            alert("Igrese usuario y contraseña");
        }

        if(mensaje == '0'){
            alert("Usuario o contraseña incorrecta");
        }

        
    </script>

    <?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>