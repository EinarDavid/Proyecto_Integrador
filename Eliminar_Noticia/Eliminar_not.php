<?php
$conexion = new mysqli("localhost", "root", "", "igle");
$sql ="SELECT * FROM noticias;";    
$result = $conexion->query($sql);
$count = mysqli_num_rows($result);
$messa = 'La cantidad de anuncios es: '.$count;


if(isset($_POST['submit'])){

    
    $conexion = new mysqli("localhost", "root", "", "igle");
    if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
    }
    $tbl_name="noticias";

    $buscarUsuario = "SELECT * FROM $tbl_name
    WHERE id_noticias = '$_POST[nro]' ";
    $result = $conexion->query($buscarUsuario);
    $count = mysqli_num_rows($result);

        if ($count == 1 ) {

                $query = " DELETE FROM noticias WHERE id_noticias = '$_POST[nro]' ";

                if ($conexion->query($query) === TRUE ) {
                    //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                    $message='Noticia Eliminada Exitosamente';
                }

                else {
                    //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                    $message='Error al Eliminar. $query <br> $conexion->error';
                }   
        }
        else{

            $message='Noticia no Existe';
            }


    $sql="SELECT *  FROM noticias ORDER BY id_noticias;";
    $result = $conexion->query($sql);
    $count = mysqli_num_rows($result);
    $messa = 'La cantidad de miembros que asistieron es: '.$count;
}    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iglesia Sebastian Pagador</title>
    <link rel="stylesheet" href="Eliminar.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>


<body>
    
    <header>
        
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
        <div class="textos">
            <h1 class="titulo">Area Administrativa</h1>
            <h2 class="subtitulo">Eliminar Noticias</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <div class="contenedor-form">
        <div class="formulario"style="text-align:center;">
            <h2>Eliminar</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!--<form action="reporte_SC.php" method="post" >   --> 
               
            <input type="number" placeholder="Nro....*" required name="nro">  
                   
                <div class="">
                    <input type="submit" value="Eliminar" name="submit"><!-- submit es un boton de envio-->
                </div>                
            </form>
            <br>     
            
        </div>
    </div>
                <?php if(!empty($messa)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);text-align:center;"><?= $messa; ?></h3>
                <?php endif; ?>

    </div class="">
        <?php
            
            $result = mysqli_query($conexion,$sql);
            
            if(!$result)
            {
                die('ocurrio un error al obtener los valores
                    de la base de datos: ' . mysql_error());
            }
            
            
            echo "<center><table class='tab'><th>Nro</th><th>Titulo</th><th>Descripcion</th>
            <th>Ruta</th><th>Tipo</th><th>Size</th>";
            //$row = $mysqli->query($sql)->fetch_array();
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr class='tabl'><td>{$row['id_noticias']}</td> ".
                        "<td>{$row['nombre']}</td> ".
                        "<td>{$row['descripcion']}</td>". 
                        //"<td>{$row['ruta']}</td> ".
                        "<td> <img class='Image' src='../Registro_Noticias/uploadnot/$row[ruta]'></td> ".
                        "<td>{$row['tipo']}</td> ".
                        "<td>{$row['size']}</td>.</tr> ";
                        
                        //<img class='Image' src='data:image/jpeg;base64,".base64_encode( $row['imagen'] )."'/></td> ".  
            }
            echo "</table></center>";
            mysqli_close($conexion);
        ?>
    </div>
   <section class="fondo">
    <div class="sesgoarriba"></div>  
    </section>
    <script src="../js/jquery.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

