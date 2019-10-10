<?php
$conexion = new mysqli("localhost", "root", "", "igle");
$sql ="SELECT * FROM presentacion_ninos;";
$result = $conexion->query($sql);
$count = mysqli_num_rows($result);
$messa = 'La cantidad de niños es: '.$count;

if(isset($_POST['submit'])){


        //$tbl_name = "membresia";
        $message='';
        //$messa ='';
        $conexion = new mysqli("localhost", "root", "", "igle");
        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

        if(isset($_POST['Buscar'])){
            switch($_POST['Buscar']){
                case "1":
                    $sql = "SELECT * FROM presentacion_ninos
                        WHERE ci = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                    break;
                case "2":
                    $sql ="SELECT * FROM presentacion_ninos
                        WHERE nombre = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                    break;
                case "3":
                    $sql = "SELECT * FROM presentacion_ninos
                        WHERE apellido_paterno = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                        break;
                default:
                    $message='Usuario No Existe';
                    $sql="SELECT * FROM presentacion_ninos;";
            }  
        }      
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iglesia Sebastian Pagador</title>
    <link rel="stylesheet" href="Filtro.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
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
    
    <header>
        
        <div class="textos">
            <h1 class="titulo">Area Administrativa</h1>
            <h2 class="subtitulo">Filtros de Niños</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <div class="contenedor-form">
        <div class="formulario" style="text-align:center;">
            <h2>Filtros</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                
               
                    <p><h3>Seleccione*</h3></p>
                    <select name="Buscar" required>
                        <option value="1">Ci</option>
                        <option value="2">Nombre</option>
                        <option value="3">Apellido Paterno</option>
                        
                    </select>
                    <input type="text" placeholder="Buscar...*" required name="ci">             
            
                <div class="">
                    <input type="submit" value="Buscar" name="submit"><!-- submit es un boton de envio-->
                   
                </div>                
            </form>
            <br>
            <h2>Descargar Reportes</h2>
            <form action="reporte.php" method="post" >
                <input type="submit" value="Descargar Todo" name="Descargar">
            </form>
            <br>
        </div>
    </div>
    <?php if(!empty($messa)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57); text-align:center;"><?= $messa; ?></h3>
                <?php endif; ?>
    </div class="">
        <?php
            //print_r($sql);
            //die;
            $result = mysqli_query($conexion,$sql);
            //$result = mysql_query($sql, $link);
            if(!$result)
            {
                die('ocurrio un error al obtener los valores
                    de la base de datos: ' . mysql_error());
            }
            
            
            echo "<center><table class='ta'><th>Nro</th><th>Ci</th><th>Nombre</th>
            <th>Apellido Paterno</th> <th>Apellido Materno</th><th>Nombre Padre</th>
            <th>Nombre Madre</th><th>Fecha de Nacimiento</th><th>Fecha de Presentacion</th>
            <th>Numero de Registro Civil</th><th>Fecha de Partida</th><th>Nombre del Pastor</th>";
            //$row = $mysqli->query($sql)->fetch_array();
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr class='tabl'><td>{$row['id_presentacion']}</td>".
                        "<td>{$row['ci']}</td> ".
                        "<td>{$row['nombre']}</td> ". 
                        "<td>{$row['apellido_paterno']}</td> ".
                        "<td>{$row['apellido_materno']}</td> ".
                        "<td>{$row['nombre_padre']}</td> ".
                        "<td>{$row['nombre_madre']}</td> ".
                        "<td>{$row['fecha_nac']}</td> ".
                        "<td>{$row['fecha_presentacion']}</td> ".
                        "<td>{$row['num_reg_civil']}</td> ".
                        "<td>{$row['fecha_partida']}</td> ".
                        "<td>{$row['nombre_pastor']}</td></tr>";

                               
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

