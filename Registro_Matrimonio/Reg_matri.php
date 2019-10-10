<?php
if(isset($_POST['submit'])){


        $tbl_name = "matrimonio";
        $message='';
        $conexion = new mysqli("localhost", "root", "", "igle");

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

                //echo "<script>alert('Ci ya existe');</script>";
                //$message='Usuario ya existe';
                $buscarUsuario = "SELECT * FROM $tbl_name
                WHERE id_ci_esposo = '$_POST[ciesposo]' ";

                $result = $conexion->query($buscarUsuario);

                $count = mysqli_num_rows($result);

                $buscarmem = "SELECT * FROM $tbl_name
                WHERE id_ci_esposa = '$_POST[ciesposa]' ";
        
                $resul = $conexion->query($buscarmem);
        
                $coun = mysqli_num_rows($resul);

                if ($count == 1 AND $coun == 1) {
                        //echo "<script>alert('Ci ya existe');</script>";
                        $message='El Matrimonio ya ha sido registrado';

                    }
                else{
                        $bus = "SELECT * FROM membresia
                        WHERE id_ci = '$_POST[ciesposo]' ";
                        $res = $conexion->query($bus);
                        $co = mysqli_num_rows($res);

                        $buscar = "SELECT * FROM membresia
                        WHERE id_ci = '$_POST[ciesposa]' ";
                        $resu = $conexion->query($buscar);
                        $cou = mysqli_num_rows($resu);

                        $buscarpas = "SELECT * FROM membresia
                        WHERE id_ci = '$_POST[ci]' ";
                        $respas = $conexion->query($buscarpas);
                        
                   
                        if ($co == 1 AND $cou == 1) {

                            //echo "<script>alert('Ci ya existe');</script>";
                            //$message='El Matrimonio ya ha sido registrado';
                            while($row = $res->fetch_assoc()){
                                if($row['id_ci'] == $_POST['ciesposo'])
                                {
                                    $nombre_esposo = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                                }
                            }
                            while($row = $resu->fetch_assoc()){
                                if($row['id_ci'] == $_POST['ciesposa'])
                                {
                                    $nombre_esposa = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                                }
                            }
                            while($row = $respas->fetch_assoc()){
                                if($row['id_ci'] == $_POST['ci'])
                                {
                                    $nombre_pas = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                                }
                            }

                            $query = "INSERT INTO matrimonio (id_matrimonio, nombre_pastor, id_ci_esposo, nombre_esposo,
                            id_ci_esposa, nombre_esposa, fecha_matrimonio)
                            VALUES ('','$nombre_pas','$_POST[ciesposo]', '$nombre_esposo', '$_POST[ciesposa]', '$nombre_esposa', '$_POST[fecha_mat]')";

                            if ($conexion->query($query) === TRUE) {
                                //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                                $message='Matrimonio Registrado Exitosamente';
                            }

                            else {
                                //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                                $message='Error al crear el usuario. $query <br> $conexion->error';
                            }

                        }
                        else{
                            $message='La Membresia del Esposo o Esposa No existe';
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
    <link rel="stylesheet" href="Reg_matri.css">

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
            <h2 class="subtitulo">Registro de Matrimonio</h2>
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
                
                    <input type="number" placeholder="Ci Pastor*" required name="ci">
                    
                    <input type="number" placeholder="Ci Esposo*" required name="ciesposo">
                    <input type="number" placeholder="Ci Esposa*" required name="ciesposa">
                    
                    <h3>Fecha de Matrimonio*</h3>
                    <input type="date" placeholder="Fecha de Matrimonio" required name="fecha_mat">
            
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

