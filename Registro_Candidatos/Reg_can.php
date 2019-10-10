<?php
if(isset($_POST['submit'])){


        $tbl_name = "candidato";
        $message='';
        $conexion = new mysqli("localhost", "root", "", "igle");

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

        $buscarmem = "SELECT * FROM membresia
        WHERE id_ci = '$_POST[ci]' ";

        $resul = $conexion->query($buscarmem);

        $coun = mysqli_num_rows($resul);

            if ($coun == 1) {
                //echo "<script>alert('Ci ya existe');</script>";
                //$message='Usuario ya existe';
                $buscarUsuario = "SELECT * FROM $tbl_name
                WHERE id_ci = '$_POST[ci]' ";

                $result = $conexion->query($buscarUsuario);

                $count = mysqli_num_rows($result);
                

                    if ($count == 1) {
                        //echo "<script>alert('Ci ya existe');</script>";
                        $message='Candidato ya existe';

                    }
                else{
                    
                    if ($_POST) {
                        $Cargo = $_POST['Cargo'];
                        if($Cargo=='1')
                        {
                            $car='Anciano';
                        }
                        if($Cargo=='2'){
                            $car='Diácono';
                        }
                        if($Cargo=='3'){
                            $car='Diaconisa';
                        }
                        if($Cargo=='4'){
                            $car='Tesorero';
                        }
                        if($Cargo=='5'){
                            $car='Super Intendente';
                        }
                        if($Cargo=='6'){
                            $car='Jovenes';
                        }
                    }

                    while($row = $resul->fetch_assoc()){
                        if($row['id_ci'] == $_POST['ci'])
                        {
                            $nombre = $row['nombre']." ". $row['ap_paterno']. " ". $row['ap_materno'] ;
                        }
                    }
                    if($_FILES['imagen']['name'] != null)
                    {
                        $image= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        
                    }else
                    {
                        $_FILES['imagen']['tmp_name']= "../Image/sinimagen.jpg";
                        $image= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        //$message.="asd";
                    }
                    $query = "INSERT INTO $tbl_name (id_candidato, id_ci,nombre_completo, categoria, foto)
                            VALUES ('','$_POST[ci]','$nombre', '$car', '$image')";

                    if ($conexion->query($query) === TRUE) {
                        //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                        $message.='Candidato Registrado exitosamente';
                    }

                    else {
                        //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                        $message='Error. $query <br> $conexion->error';
                    }
                }
            }
            else{
                $message ='Membresia no Existe';
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
    <link rel="stylesheet" href="Reg_candi.css">

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
            <h2 class="subtitulo">Registro de Candidatos</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <div class="contenedor-form">
        <div class="formulario" style="text-align:center;">
            <h2>Registro</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                
                    <input type="number" placeholder="Ci*" required name="ci">

                    <p><h3>Categoria*</h3></p>
                    <select name="Cargo" required>
                        <option value="1">Anciano</option>
                        <option value="2">Diácono</option>
                        <option value="3">Diaconisa</option>
                        <option value="4">Tesorero</option>
                        <option value="5">Super Intendente</option>
                        <option value="6">Jovenes</option>

                    </select>
                    <div  class="file">
                    <h3>Foto*</h3>
                    <input type="file" name="imagen" >
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

