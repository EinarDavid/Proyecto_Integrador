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

            if ($count == 1 ) {

                $buscar = "SELECT * FROM usuario
                WHERE id_ci = '$_POST[ci]' ";
                $resultado = $conexion->query($buscar);
                $coun = mysqli_num_rows($resultado);

                if ($coun == 1 ) {
                    $query = " DELETE FROM usuario WHERE id_ci = '$_POST[ci]' ";

                    if ($conexion->query($query) === TRUE ) {
                        //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                        $message='Usuario Eliminado Exitosamente';
                    }

                    else {
                        //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                        $message='Error al Eliminar al usuario. $query <br> $conexion->error';
                    }
                }
                else{
                    $message='Usuario no Existe';
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
    <link rel="stylesheet" href="El_us.css">


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
            <h2 class="subtitulo">Eliminar Usuario</h2>
            <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
            <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>


    <div class="contenedor-form">
            
          
        
        <div class="formulario" style="text-align:center;">
            <h2>Eliminar</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="">
                    <input type="number" placeholder="Ci*" name="ci" required>
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