<?php
if(isset($_POST['submit'])){


        $tbl_name = "membresia";
        $message='';
        $conexion = new mysqli("localhost", "root", "", "igle");

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

        $buscarUsuario = "SELECT * FROM $tbl_name
        WHERE id_ci = '$_POST[ci]' ";

        $result = $conexion->query($buscarUsuario);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $message='Membresia ya Existe';
        }
        else{


            if ($_POST) {
                $Genero = $_POST['Genero'];
                if($Genero=='1')
                {
                    $gen='Masculino';
                }
                if($Genero=='2'){
                    $gen='Femenino';
                }
                $est = $_POST['Estado_civil'];
                if($est == '1')
                {
                    $es='Solter@';
                }
                if ($est =='3'){
                    $es='Viud@';
                }
                if($est=='2'){
                    $es=='Casad@';
                }
            }
                    if($_FILES['imagen']['name'] != null)
                    {
                        $image= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        
                    }else
                    {
                        $_FILES['imagen']['tmp_name']= "../Image/sinimagen.jpg";
                        $image= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        
                    }
            $miembro='Bautizo';
            $query = "INSERT INTO membresia (id_membresia, id_ci, nombre, ap_paterno, ap_materno, genero,
                        telefono, celular, fecha_nac, lugar, fecha_conversion, fecha_bautizo,
                        profesion, ocupacion, direccion, estado_civil, imagen, estado, miembro_por)
                    VALUES ('','$_POST[ci]', '$_POST[nombre]', '$_POST[ap_pa]', '$_POST[ap_ma]',
                    '$gen', '$_POST[tel]', '$_POST[cel]', '$_POST[fecha_nac]', '$_POST[lugar]',
                    '$_POST[fecha_con]', '$_POST[fecha_bau]', '$_POST[profesion]',
                    '$_POST[ocupacion]','$_POST[direccion]','$es','$image','', '$miembro')";
            $query2="INSERT INTO miembro_bautizo (id_bautizo, id_ci) VALUES ('','$_POST[ci]')";
            
            if ($conexion->query($query) === TRUE and $conexion->query($query2) ===TRUE ) {
                //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                $message='Membresia Registrada Exitosamente';
            }

            else {
                //echo "<script>alert('Error al crear la membresia. $query <br> $conexion->error');</script>";
                $message='Error al crear la membresia. $query <br> $conexion->error';
            }
        }
        mysqli_close($conexion);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Iglesia Sebastian Pagador</title>
    <link rel="stylesheet" href="Reg_Bauti.css">

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
            <h3 class="subtitulo">Registro por Bautizo</h3>
            <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>


    <div class="contenedor-for">
            
        <div class="formula" style="text-align:center;">
            <h2>Registro</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <div class="izquierdano">
                    <input type="number" placeholder="CI*" required name="ci">
                </div>
                <div class="derecha">
                    <input type="text" placeholder="Nombre*" required name="nombre">
                </div>
                <div class="izquierda">
                    <input type="text" placeholder="Apellido Paterno*" required name="ap_pa">
                </div>
                <div class="derecha">
                <input type="text" placeholder="Apellido Materno"  name="ap_ma">
                </div>
                <div class="izquierdagen">
                    <p><h3>Genero</h3></p>
                    <select name="Genero">

                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>
                </div>
                <div class="derechatel">
                    <input type="number" placeholder="Telefono" name="tel">
                </div>
                <div class="izquierdacel">
                    <input type="number" placeholder="Celular" name ="cel">
                </div>
                <div class="derecha">
                <h3>Fecha de Nacimiento*</h3>
                    <input type="date" placeholder="Fecha de Nacimiento"  name="fecha_nac">
                </div>
                <div class="izquierdalu">
                    <input type="text" placeholder="Lugar de Nacimiento" name="lugar">
                </div>
                <div class="derecha">
                    <h3>Fecha de Conversion*</h3>
                    <input type="date" placeholder="Fecha de Conversion"  name="fecha_con">
                </div>
                <div class="izquierdafecha">
                    <h3>Fecha de Bautizo*</h3>
                    <input type="date" placeholder="Fecha de Bautizo"  name="fecha_bau">
                </div>
                <div class="derechapro">
                    <input type="text" placeholder="Profesion" name="profesion">
                </div>

                <div class="izquierdagen">
                    <p><h3>Estado Civil</h3></p>
                    <select name="Estado_civil">

                        <option value="1">Solter@</option>
                        <option value="2">Casad@</option>
                        <option value="3">Viud@</option>

                    </select>
                </div>
                
                <div class="derechaoc">
                    <input type="text" placeholder="Ocupacion" name="ocupacion">
                </div>
                <div  class="file">
                <h3>Imagen</h3>
                    <input type="file" name="imagen" >
                </div>
                <div class="ultimo">
                    <input type="text" placeholder="Direccion" name="direccion">
                </div>
                <div class="">
                    <input type="submit" value="Enviar" name="submit"><!-- submit es un boton de envio-->
                </div>
            </form>
        </div>
    </div>

   <section class="fondo">
    <div class="sesgoarriba"></div>  

    
    </section>

    <script src="../js/jquery.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
