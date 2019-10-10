<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iglesia Sebastian Pagador</title>
    <link rel="stylesheet" href="adminis.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/main.js"></script>-->
</head>

<body>
                <?php
                session_start();
                if($_SESSION["cargo"]=='Administrador')
                {
                    require "../header/menu.php";
                }
                else{
                    require "../header/menu_pas.php";
                }
                
                ?>             

<!--style="text-align:center;"-->

    <header>
    
                  
        <div class="textos">
            <h1 class="titulo">Iglesia Sebastian Pagador UCE</h1>
            <h3 class="subtitulo">Area Administrativa</h3>
            
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <section class="galeria">
            <div class="sesgoarriba"></div>

            <div class="imagenes none">
                <img src="../Image/ban.jfif" alt="">
            </div>
            <div class="imagenes">
                <img src="../Image/ca.jfif" alt="">
            </div>

            <div class="imagenes">
                <img src="../Image/Creo.jfif" alt="">

                <!--<div class="encima">
                    <h2>Sebastian Pagador</h2>
                    <div></div>
                </div>-->
            </div>

            <div class="imagenes">
                <img src="../Image/cora.jfif" alt="">

            </div>

            <div class="imagenes none">
                <img src="../Image/co.jfif" alt="">
            </div>
            <div class="sesgoabajo"></div> 

        </section>

        <!--<section class="fondo2">
                    <div class="sesgoarriba"></div>
                        <div class="contenedor">
                            <h2 class="titulo-footer">Siguenos en: </h2>
                            <h3 class="subtitulo-footer">UCE</h3>
                            <div class="clientes">
                                <div class="cliente2">
                                    <img src="../Image/facebook.png" alt="">
                                    <h3>Facebook</h3>
                                </div>
                                <div class="cliente2">
                                    <img src="../Image/Instagram.jfif" alt="">
                                    <h3>Instagram</h3>
                                </div>
                                <div class="cliente2">
                                    <img src="../Image/facebook.png" alt="">
                                    <h3>YouTube</h3>
                                </div>

                            </div>
                           <h3 class="subtitulo-patrocinadores especial">y muchos más clientes...</h3>
                            <h3 class="footer">Direccion: Plaza 10 De Febrero / Villa Pagador</h3>
                                <h2 class="footer">Horarios </h3>
                                <h3 class="footer">Lunes a Viernes (8:00-12:00 / 14:00-18:00)</h3>
                                <h3 class="footer">Domingo (9:00-13:00)</h3>
                                <h3 class="footer">Telefono: 4237929</h3>
                                <h3 class="footer">Celular: 70736964</h3>
                                <h3 class="footer">Iglesia Sebatian Pagador UCE</h3>
                        </div>
                    <div class="sesgoabajo-unico"></div>
                </section>-->

        <!--<script src= "../js/jquery.min.js" ></script>
        <script src= "../js/headroom.min.js" ></script>
        <script src= "../js/menu.js" ></script>-->
    <script src="../js/jquery.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
