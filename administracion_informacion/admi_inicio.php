   <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iglesia Sebastian Pagador</title>
    <link rel="stylesheet" href="admin_inici.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<body>

<?php
                require "../header/Menu_area_adm.php";
                ?>  
    <header>

        <div class="textos">
            <h1 class="titulo">Iglesia Sebastian Pagador UCE</h1>
            <h3 class="subtitulo">Area Administrativa</h3>
            
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <main>
        <section class="acerca-de">
            <div class="contenedor">
                <h2 class="sobre-nosotros">Sobre nosotros</h2>
                
                <p class="parrafo">Refleja la administración eficiente de los 
                    recursos económicos para la extensión del evangelio a toda latitud, 
                    además de la buena mayordomía aplicada de acuerdo a los planes programáticos de la iglesia.</p>
                

                <!-- <a href="#" class="boton">Suscribete</a> -->

            </div>
        </section>

        <section>
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../Image/igle/a6.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Tesorero</h5>
                        <p>Sirilo Contreras</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../Image/igle/a7.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5> </h5>
                        <p></p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../Image/igle/a8.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                        </div>
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
                </div>
        </section>
<br>
<br>
<br>
        <section class="galeria">
            <!--<div class="sesgoarriba"></div>-->

            <div class="imagenes none">
                <img src="../Image/igle/a9.png" alt="">
            </div>
            <div class="imagenes">
                <img src="../Image/igle/a4.jpg" alt="">
            </div>

            <div class="imagenes">
                <img src="../Image/igle/a1.jpg" alt="">

                
            </div>

            <div class="imagenes">
                <img src="../Image/igle/a2.jpg" alt="">

            </div>

            <div class="imagenes none">
                <img src="../Image/igle/a5.jpg" alt="">
            </div>
            <!--<div class="sesgoabajo2"></div>--> 

        </section>
        <br>
        <br>
        <br>
         <section class="fondo2">
                    <div class="sesgoarriba"></div>
                    <?php
                    require "../footer/footer_areas.php";
                    ?>     
        </section>
    </main>

    <script src="../js/jquery.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>