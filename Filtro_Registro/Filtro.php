<?php
$conexion = new mysqli("localhost", "root", "", "igle");
$sql ="SELECT * FROM membresia;";
$result = $conexion->query($sql);
$count = mysqli_num_rows($result);
$messa = 'La cantidad de miembros es: '.$count;
if(isset($_POST['submit'])){


        $tbl_name = "membresia";
        $message='';
        //$messa ='';
        $conexion = new mysqli("localhost", "root", "", "igle");
        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

        if(isset($_POST['Buscar'])){
            switch($_POST['Buscar']){
                case "1":
                    $sql = "SELECT * FROM membresia
                        WHERE id_ci = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                    break;
                case "2":
                    $sql ="SELECT * FROM membresia
                        WHERE nombre = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                    break;
                case "3":
                    $sql = "SELECT * FROM membresia
                        WHERE ap_paterno = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                        break;
                case "4":

                    $sql = "SELECT * FROM membresia
                        WHERE genero = '$_POST[ci]';";
                        $result = $conexion->query($sql);
                        $count = mysqli_num_rows($result);
                        $messa = 'La cantidad de miembros encontrados es: '.$count;
                        break;
                default:
                    $message='Usuario No Existe';
                    $sql="SELECT * FROM membresia;";
            }  
        }
        else{
            $message='Usuario No Existe';
            $sql="SELECT * FROM membresia;";
        }
    }
    if(isset($_POST['modificar'])){
        $idCi=@$_POST['ci'];
        $messa.=$idCi;
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
            <h2 class="subtitulo">Filtros de Membresia</h2>
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
                        <option value="4">Genero</option>
                    </select>
                    <input type="text" placeholder="Seach....*" required name="ci">             
            
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
            <form action="reporte.php" method="post" >
            <p><h3>Seleccione Genero*</h3></p>
                    <select name="Gen" required>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                <input type="submit" value="Descargar" name="Genero">
            </form>
            <br>
            <form action="reporte.php" method="post" >
            <p><h3>Seleccione Estado Civil*</h3></p>
                    <select name="Estado_civil">
                        <option value="1">Solter@</option>
                        <option value="2">Casad@</option>
                        <option value="3">Viud@</option>

                    </select>
                <input type="submit" value="Descargar" name="estado">
            </form>
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
            
            
            echo "<center><table class='ta'><th>Nro</th><th>CI</th><th>Nombre</th>
            <th>A. Paterno</th> <th>A. Materno</th><th>Genero</th>
            <th>Telefono</th><th>Celular</th><th>F. Nacimiento</th><th>lugar</th>
            <th>F. Conversion</th><th>F. Bautizo</th><th>Profesion</th>
            <th>Ocupacion</th><th>Direccion</th><th>Estado Civil</th>
            <th>Imagen</th><th>Estado</th><th>miembro por</th><th>Modificar</th>";
            //$row = $mysqli->query($sql)->fetch_array();
            while($row = @mysqli_fetch_assoc($result))
            {

                ?>
                    
                    <form method='post' action="modificar.php">
                    
                <?php
                echo "<tr class='tabl'><td>{$row['id_membresia']}</td>".
                        "<td>{$row['id_ci']}</td> ".
                        "<td>{$row['nombre']}</td> ". 
                        "<td>{$row['ap_paterno']}</td> ".
                        "<td>{$row['ap_materno']}</td> ".
                        "<td>{$row['genero']}</td> ".
                        "<td>{$row['telefono']}</td> ".
                        "<td>{$row['celular']}</td> ".
                        "<td>{$row['fecha_nac']}</td> ".
                        "<td>{$row['lugar']}</td> ".
                        "<td>{$row['fecha_conversion']}</td> ".
                        "<td>{$row['fecha_bautizo']}</td> ".
                        "<td>{$row['profesion']}</td> ".
                        "<td>{$row['ocupacion']}</td> ".
                        "<td>{$row['direccion']}</td> ".
                        "<td>{$row['estado_civil']}</td> ".
                        "<td> <img class='Image' src='data:image/jpeg;base64,".base64_encode( $row['imagen'] )."'/></td> ".
                        "<td>{$row['estado']}</td>".
                        "<td>{$row['miembro_por']}</td><td>";  
                        $ci = $row["id_ci"];  
                        ?>
                            <input type=hidden name=ci value="<?php echo $ci ?>"> 
                            <input type='submit' name='modificar' value="Modificar">   
                        <?php
                echo "</td></tr>";   
                echo "</form>";  
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

