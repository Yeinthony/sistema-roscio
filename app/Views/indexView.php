<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <
</head>
<body>
<?php include("../sistema-roscio/app/Views/templates/header.php"); ?>

<header class="navbar-header">
    <div href="#inicio" id="logoEv" class="logo">
        <img class="logo-navbar" src="<?php base_url() ?>assets/images/log.png" alt='Logo'/>
    </div>        
    <nav class="nav-bar">
        <a href="#home">Sobre nosotros</a>
        <a href="http://localhost/sistema-roscio/login">Login</a>
    </nav>
</header>

<div class="imagenFondo">
            <section class="inicio" id="inicio">
                <div class="content">
                    <div class="esquinaUno"></div>
                    <div class="esquinaDos"></div>
                    <div class="contenido">
                        <h3>L.N Juan German Roscio</h3>
                        <p>El Liceo de Turno Integral "Juan Germán Roscio", fue fundado en el año 1938, siendo Gobernador del estado Guárico el General Emilio Arévalo Cedeño, quien por decreto ordenó su creación con el nombre de “Colegio Roscio”.
                        </p>  
                    </div> 
                </div>
            </section>
        </div>

        <div>
            <section   class="misionVision" id="misionVision">

                <div class="container__misionVision">
                    <div class="mision">
                        <h3>Misión</h3>
                        <p>Formar individuos con calidad humana capaces de enfrentar los retos del mundo que les rodea, bajo un sistema de educación formal, utilizando estrategias pedagógicas de avanzada, que se complementan con actividades culturales y deportivas, para su desarrollo integral.</p>
                    </div>
    
                    <div class="vision">
                        <h3>Visión</h3>
                        <p>Ser una institución de vanguardia con trayectoria, que ofrezca una educación de calidad, basada en valores, a través de profesionales que favorezcan la formación de individuos íntegros, críticos y creativos, capaces de adaptarse a los retos de transformación de la sociedad, con participación activa de la familia como ente mediador en el aprendizaje de sus hijos.</p>
                    </div>
                </div>

            </section>
        </div>

        <div class="imagenFondoDos">
            <section class="objetivos" id="objetivos">
                <div class="contenedor__objetivos">
                    <div class="contenidoObjetivosFilosofia  objetivoGeneral">
                        <div class="objetivosEsquinaUno"></div>
                        <div class="objetivosEsquinaDos"></div>
                        <div class="contenidoObj">
                            <h3>OBJETIVO INSTITUCIONAL</h3>
                            <p> Favorecer la Formación Integral para la Vida, a través de un criterio de desarrollo pleno de sus dimensiones psicológicas, biológicas y sociales, con aptitudes y actitudes de autonomía y crítica responsable, valores de solidaridad para asumir un compromiso de transformación social, comprometidos en la construcción de una sociedad justa, afianzando los valores humanos, de acuerdo a sus intereses y necesidades.</p>
                        </div>
                    </div>
                    <div class="contenidoObjetivosFilosofia filosofia">
                        <div class="objetivosEsquinaUno"></div>
                        <div class="objetivosEsquinaDos"></div>
                        <div class="contenidoObj">
                            <h3>FILOSOFÍA INSTITUCIONAL.</h3>    
                            <p>Las políticas gerenciales que orientan la labor pedagógica y administrativa del Liceo Nacional “Juan Germán Roscio”, se enmarcan en el paradigma emergente del modelo de gestión de las Organizaciones Inteligentes. La cual es definida por Garrat (1990) como las organizaciones inteligentes que crean un clima de trabajo donde los procesos permiten a todos los miembros aprender de forma consciente de su trabajo. Esto a su vez lo hace capaz de mover ese aprendizaje adquirido al lugar que sea necesario de manera tal que pueda ser utilizado por la organización y que este conocimiento pueda ser transformado constantemente.
                            <br>
                            Esta filosofía promueve la participación activa y efectiva de todos los actores del hecho educativo, lo cual se traduce en: liderazgos compartidos una estructura que funcionalmente es horizontal, visión compartida, planificación estratégica, trabajo en equipo y la continúa formación en servicio a través de círculos de aprendizajes y experiencias significativas de enseñar y aprender.
                            </p>
                        </div>

                    </div>
                </div>
            </section>
        </div>


<?php include("../sistema-roscio/app/Views/templates/footer.php"); ?>
</body>
</html>