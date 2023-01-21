<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php base_url() ?>assets/styles/Login.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/styles/Navbar.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div href="#inicio" id="logoEv" class="logo">
            <img src="<?php base_url() ?>assets/images/log2.png" alt='Logo'/>
        </div>
        <input class="trans-bar" type="checkbox" id="menu-bar" />
        <label htmlFor="menu-bar" class="fa fa-bars trans-bar"></label>
        
        <nav class="nav-bar">
            <a href="#inicio">Inicio</a>
            <a href="#login">Login</a>
        </nav>
    </header>

    <div class="container">
        <div class="container-logo">
            <img src="<?php base_url() ?>assets/images/log2.png" alt="Logo Roscio">
        </div>
       <div class="formulario">
            <form action="" method="post">
                <div class="mb-5 mt-3">
                    <h3>LOGIN</h3>
                </div>
                <div class="mb-4">
                    <input type="text" class="form-input" id="user-form" placeholder="Usuario">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-input" id="pass-form" placeholder="Contraseña">
                </div>
                <div class="mb-4 d-grid gap-2">
                    <button class="btn btn-primary" type="button">INGRESAR</button>
                </div>
            </form>
       </div>
    </div>
</body>
</html>