<?php
if(isset($_POST['modificar'])){
        $idCi=@$_POST['ci'];
        $messa= $idCi;

        $tbl_name = "membresia";
        $message='';

        $conexion = new mysqli("localhost", "root", "", "igle");
        if ($conexion->connect_error) {die("La conexion falló: " . $conexion->connect_error);}

        $sql = "SELECT * FROM $tbl_name
        WHERE id_ci = '$idCi' ";
        $result = $conexion->query($sql);
        $row = @mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit'])){

        $tbl_name = "membresia";
        $message='';
        $conexion = new mysqli("localhost", "root", "", "igle");
        
        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }
        
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
            //$im=@$_POST['asd'];
                    if($_FILES['imagen']['name'] != null)
                    {
                        $image= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                        
                        $query = "UPDATE membresia SET nombre='$_POST[nombre]', ap_paterno='$_POST[ap_pa]', ap_materno='$_POST[ap_ma]',
                        genero='$gen',
                        telefono='$_POST[tel]', celular='$_POST[cel]', fecha_nac='$_POST[fecha_nac]',
                        lugar='$_POST[lugar]', fecha_conversion='$_POST[fecha_con]', fecha_bautizo='$_POST[fecha_bau]',
                        profesion='$_POST[profesion]', ocupacion='$_POST[ocupacion]', direccion='$_POST[direccion]',
                         estado_civil='$es', imagen='$image' Where id_ci='$_POST[ci]' ";
            
            
                        if ($conexion->query($query) === TRUE ) {
                            //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                            //$message='Membresia Modificada Exitosamente';
                            header("location: Filtro.php");
                        }

                        else {
                            //echo "<script>alert('Error al crear la membresia. $query <br> $conexion->error');</script>";
                            $message='Error al modificar la membresia. $query <br> $conexion->error';
                        }
                    }else
                    {
                        $query = "UPDATE membresia SET nombre='$_POST[nombre]', ap_paterno='$_POST[ap_pa]', ap_materno='$_POST[ap_ma]',
                        genero='$gen',
                        telefono='$_POST[tel]', celular='$_POST[cel]', fecha_nac='$_POST[fecha_nac]',
                        lugar='$_POST[lugar]', fecha_conversion='$_POST[fecha_con]', fecha_bautizo='$_POST[fecha_bau]',
                        profesion='$_POST[profesion]', ocupacion='$_POST[ocupacion]', direccion='$_POST[direccion]',
                         estado_civil='$es' Where id_ci='$_POST[ci]' ";
            
            
                        if ($conexion->query($query) === TRUE ) {
                            //echo "<script>alert('Modificado Exitosamente!');</script>";
                            //$message='Membresia Modificada Exitosamente';
                            header("location: Filtro.php");
                        }

                        else {
                            //echo "<script>alert('Error al crear la membresia. $query <br> $conexion->error');</script>";
                            $message='Error al modificar la membresia. $query <br> $conexion->error';
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
    <link rel="stylesheet" href="../Registro_Bautizo/Reg_Bauti.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>


<body>
<?php
                /*session_start();
                if($_SESSION["cargo"]=='Administrador')
                {
                    require "../header/menu.php";
                }
                else{
                    require "../header/menu_pas.php";
                }*/
                
                ?>   
    <header>
        <div class="textos">
            <h1 class="titulo">Area Administrativa</h1>
            <h3 class="subtitulo">Modificar Registro</h3>
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
                    <input type="number" placeholder="CI*" value="<?php echo $row['id_ci'];?>" readonly="readonly" required name="ci">
                </div>
                <div class="derecha">
                    <input type="text" placeholder="Nombre*" value="<?php echo $row['nombre'];?>" required name="nombre">
                </div>
                <div class="izquierda">
                    <input type="text" placeholder="Apellido Paterno*" value="<?php echo $row['ap_paterno'];?>" required name="ap_pa">
                </div>
                <div class="derecha">
                <input type="text" placeholder="Apellido Materno" value="<?php echo $row['ap_materno'];?>" name="ap_ma">
                </div>
                <div class="izquierdagen">
                    <p><h3>Genero</h3></p>
                    
                    <select name="Genero" >
                    <?php
                        if($row['genero']=='Masculino'){
                            ?>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <?php
                        }else{
                            ?>
                            <option value="2">Femenino</option>
                            <option value="1">Masculino</option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="derechatel">
                    <input type="number" placeholder="Telefono" value="<?php echo $row['telefono'];?>" name="tel">
                </div>
                <div class="izquierdacel">
                    <input type="number" placeholder="Celular" value="<?php echo $row['celular'];?>" name ="cel">
                </div>
                <div class="derecha">
                <h3>Fecha de Nacimiento*</h3>
                    <input type="date" placeholder="Fecha de Nacimiento" value="<?php echo $row['fecha_nac'];?>" required name="fecha_nac">
                </div>
                <div class="izquierdalu">
                    <input type="text" placeholder="Lugar de Nacimiento" value="<?php echo $row['lugar'];?>" name="lugar">
                </div>
                <div class="derecha">
                    <h3>Fecha de Conversion*</h3>
                    <input type="date" placeholder="Fecha de Conversion" value="<?php echo $row['fecha_conversion'];?>" required name="fecha_con">
                </div>
                <div class="izquierdafecha">
                    <h3>Fecha de Bautizo*</h3>
                    <input type="date" placeholder="Fecha de Bautizo" value="<?php echo $row['fecha_bautizo'];?>" required name="fecha_bau">
                </div>
                <div class="derechapro">
                    <input type="text" placeholder="Profesion" value="<?php echo $row['profesion'];?>" name="profesion">
                </div>

                <div class="izquierdagen">
                    <p><h3>Estado Civil</h3></p>
                    <select name="Estado_civil">
                        <?php
                        if($row['estado_civil']=='Solter@')
                        {
                            ?>
                                <option value="1">Solter@</option>
                                <option value="2">Casad@</option>
                                <option value="3">Viud@</option>
                            <?php
                        }
                        if($row['estado_civil']=='Casad@')
                        {
                            ?>
                                <option value="2">Casad@</option>
                                <option value="1">Solter@</option>
                                <option value="3">Viud@</option>
                            <?php
                        }
                        else{
                            ?>
                                <option value="3">Viud@</option>
                                <option value="1">Solter@</option>
                                <option value="2">Casad@</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="derechaoc">
                    <input type="text" placeholder="Ocupacion" value="<?php echo $row['ocupacion'];?>" name="ocupacion">
                </div>
                <div  class="file">
                <h3>Imagen</h3>
                    <img height="200px" src="data:image/jpeg;base64,<?php echo base64_encode( $row['imagen'] ); ?>" /> <br><br>
                    <input type="file" name="imagen" >
                </div>
                <div class="ultimo">
                    <input type="text" placeholder="Direccion" value="<?php echo $row['direccion'];?>" name="direccion">
                </div>
                <div class="">
                <?php
                mysqli_close($conexion);
                ?>
                
                    
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