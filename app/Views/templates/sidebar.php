<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-0 container-sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start pt-2 text-white min-vh-100">
                
                <ul class="body-sidebar nav nav-pills flex-column mb-sm-auto mb-0 mt-4 align-items-center align-items-sm-start" id="menu">
                    <li class="option-sidebar">
                        <a href="<?php base_url() ?>inicio" class="link-sidebar align-middle ">
                            <i class="fa-solid fa-house"></i>
                            <span class="ms-1 d-none d-sm-inline">Inicio</span>
                        </a>
                    </li>
                    <li class="option-sidebar">
                        <a href="#submenu1" data-bs-toggle="collapse" class="link-sidebar mt-2 align-middle">
                            <i class="fa-solid fa-clipboard-list"></i>
                            <span class="ms-1 d-none d-sm-inline">Registrar</span> 
                        </a>
                        <ul class="subOptions-sidebar collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li>
                                <a href="registrar-tipos" class="link-sidebar"> 
                                    <i class="fa-solid fa-list-ul"></i>
                                    <span class="d-none d-sm-inline">Tipo</span> 
                                </a>
                            </li>
                            <li>
                                <a href="registrar-personal" class="link-sidebar"> 
                                     <i class="fa-solid fa-users"></i>
                                    <span class="d-none d-sm-inline">Personal</span> 
                                </a>
                            </li>
                            <li>
                                <a href="registrar-entrada" class="link-sidebar"> 
                                    <i class="fa-solid fa-door-open"></i>
                                    <span class="d-none d-sm-inline">Entrada</span>  
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link-sidebar"> 
                                    <i class="fa-solid fa-door-closed"></i>
                                    <span class="d-none d-sm-inline">Salida</span>  
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="option-sidebar">
                        <a href="#submenu2" data-bs-toggle="collapse" class="link-sidebar align-middle ">
                            <i class="fa-solid fa-eye"></i>
                            <span class="ms-1 d-none d-sm-inline">Ver</span>
                        </a>
                        <ul class="subOptions-sidebar collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li>
                                <a href="ver-tipos" class="link-sidebar"> 
                                    <i class="fa-solid fa-list-ul"></i>
                                    <span class="d-none d-sm-inline">Tipos</span> 
                                </a>
                            </li>
                            <li>
                                <a href="ver-personal" class="link-sidebar"> 
                                     <i class="fa-solid fa-users"></i>
                                    <span class="d-none d-sm-inline">Personal</span> 
                                </a>
                            </li>
                            <li>
                                <a href="#" class="link-sidebar"> 
                                    <i class="fa-solid fa-check"></i>
                                    <span class="d-none d-sm-inline">Asistencia</span>  
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="pb-4">
                    <a href="<?php base_url() ?>salir" class="link-sidebar align-middle ">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="ms-1 d-none d-sm-inline">Salir</span>
                    </a>
                </div>
            </div>
        </div>
