<?php
if(isset($_POST['submit'])){


        $tbl_name = "presentacion_ninos";
        $message='';
        $conexion = new mysqli("localhost", "root", "", "igle");

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

        $buscarUsuario = "SELECT * FROM $tbl_name
        WHERE ci = '$_POST[ci]' ";

        $result = $conexion->query($buscarUsuario);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $message='CI ya Existe';
        }
        else{

            $buscar = "SELECT * FROM membresia
            WHERE id_ci = '$_POST[ci_pas]' ";

            $resultado = $conexion->query($buscar);

            while($row = $resultado->fetch_assoc()){
                if($row['id_ci'] == $_POST['ci_pas'])
                {
                    $nombre = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                }
            }
            $query = "INSERT INTO $tbl_name (id_presentacion, ci, nombre, apellido_paterno, apellido_materno,
                    nombre_padre, nombre_madre, fecha_nac, fecha_presentacion, num_reg_civil, fecha_partida, nombre_pastor)
                    VALUES ('','$_POST[ci]', '$_POST[nom]', '$_POST[ap_pa]', '$_POST[ap_ma]',
                    '$_POST[nom_pa]', '$_POST[nom_ma]', '$_POST[fecha_nac]', '$_POST[fecha_pre]',
                    '$_POST[reg_civ]', '$_POST[fecha_par]', '$nombre' )";
            
            if ($conexion->query($query) === TRUE ) {
                //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                $message='Presentacion Registrada Exitosamente';
            }

            else {
                //echo "<script>alert('Error al crear la membresia. $query <br> $conexion->error');</script>";
                $message='Error al crear el registro. $query <br> $conexion->error';
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
    <link rel="stylesheet" href="Reg_ninos.css">

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
            <h2 class="subtitulo">Registro de Niños</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <div class="contenedor-form">
        <div class="formulario" style="text-align:center;">
            <h2>Registro</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                
                    <input type="number" placeholder="Ci*" required name="ci">
                    <input type="text" placeholder="Nombre*" required name="nom">
                    <input type="text" placeholder="Apellido Paterno*" required name="ap_pa">
                    <input type="text" placeholder="Apellido Materno" name="ap_ma">
                    <input type="text" placeholder="Nombre Padre*" required name="nom_pa">
                    <input type="text" placeholder="Nombre Madre*" required name="nom_ma">
                    <h3>Fecha de Nacimiento*</h3>
                    <input type="date" placeholder="Fecha de Nacimiento" required name="fecha_nac">
                    <h3>Fecha de Presentacion*</h3>
                    <input type="date" placeholder="Fecha de Matrimonio" required name="fecha_pre">
                    <input type="number" placeholder="Numero Registro Civil*" required name="reg_civ">
                    <h3>Fecha de Partida*</h3>
                    <input type="date" required name="fecha_par">
                    <input type="number" placeholder="Ci Pastor*" required name="ci_pas">

            
            
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

