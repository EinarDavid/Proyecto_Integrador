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

                while($row = $result->fetch_assoc()){
                    if($row['id_ci'] == $_POST['ci'])
                    {
                        $nombre = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                    }
                }


                $d= "SELECT * FROM $tbl_name WHERE (id_ci, miembro_por) = ('$_POST[ci]', 'Solicitud') ";
                $resulta = $conexion->query($d);
                $coun = mysqli_num_rows($resulta);
                if($coun == 1)
                {
                    $query = " DELETE FROM membresia WHERE id_ci = '$_POST[ci]' ";
                    $query1 = "DELETE FROM miembro_solicitud WHERE id_ci = '$_POST[ci]' ";
                    $query2= "INSERT INTO miembro_transferido (id_transferido, id_ci,nombre, fecha_transferencia)
                    VALUES ('','$_POST[ci]','$nombre', '$_POST[fecha_tran]')";

                    if ($conexion->query($query) === TRUE and $conexion->query($query1) ===TRUE and $conexion->query($query2)===TRUE) {
                        //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                        $message='Usuario Transferido Exitosamente';
                    }

                    else {
                        //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                        $message='Error al Transferir al usuario. $query <br> $conexion->error';
                    }
                }
                $de= "SELECT * FROM $tbl_name WHERE (id_ci, miembro_por) = ('$_POST[ci]', 'Transferencia') ";
                $resultad = $conexion->query($de);
                $cou = mysqli_num_rows($resultad);
                if($cou == 1)
                {
                    $query = " DELETE FROM membresia WHERE id_ci = '$_POST[ci]' ";
                    $query1 = "DELETE FROM miembro_transferencia WHERE id_ci = '$_POST[ci]' ";
                    $query2= "INSERT INTO miembro_transferido (id_transferido, id_ci,nombre, fecha_transferencia)
                    VALUES ('','$_POST[ci]','$nombre', '$_POST[fecha_tran]')";

                    if ($conexion->query($query) === TRUE and $conexion->query($query1) ===TRUE and $conexion->query($query2)===TRUE) {
                        //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                        $message='Usuario Transferido Exitosamente';
                    }

                    else {
                        //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                        $message='Error al Transferir al usuario. $query <br> $conexion->error';
                    }
                }
                $des= "SELECT * FROM $tbl_name WHERE (id_ci, miembro_por) = ('$_POST[ci]', 'Bautizo') ";
                $resultado = $conexion->query($des);
                $co = mysqli_num_rows($resultado);
                if($co == 1)
                {
                    $query = " DELETE FROM membresia WHERE id_ci = '$_POST[ci]' ";
                    $query1 = "DELETE FROM miembro_bautizo WHERE id_ci = '$_POST[ci]' ";
                    $query2= "INSERT INTO miembro_transferido (id_transferido, id_ci,nombre, fecha_transferencia)
                    VALUES ('','$_POST[ci]','$nombre', '$_POST[fecha_tran]')";

                    if ($conexion->query($query) === TRUE and $conexion->query($query1) ===TRUE and $conexion->query($query2)===TRUE) {
                        //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                        $message='Usuario Transferido Exitosamente';
                    }

                    else {
                        //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                        $message='Error al Transferir al usuario. $query <br> $conexion->error';
                    }
                }

                
            }
            else{

                $message='Miembro no Existe';
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
    <link rel="stylesheet" href="Reg_transferidos.css">


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
            <h2 class="subtitulo">Registro de Transferidos</h2>
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
                <div class="">
                    <input type="number" placeholder="Ci*" name="ci" required>
                </div>
                <div class="">
                <h3>Fecha de Transferencia*</h3>
                    <input type="date" placeholder="Fecha de Transferencia" required name="fecha_tran">
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