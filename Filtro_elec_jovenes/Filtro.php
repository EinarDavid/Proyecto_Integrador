<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "igle");
$sql ="SELECT * FROM candidato WHERE categoria = 'Jovenes';";
$result = $conexion->query($sql);
$count = mysqli_num_rows($result);
$messa = 'La cantidad de cantidatos es: '.$count;

if(isset($_POST['submit'])){

        //$messa ='';
        $nombre=@$_POST['nom'];
        //$message=$nombre;
        $idCi=@$_POST['ci'];
        //$message.= $idCi;
        $cate=@$_POST['categoria'];
        //$message.= $cate;
        $votos=@$_POST['voto'];
        //$message.=$votos;

        $sql2 = "SELECT * FROM votacion WHERE (ci_miembro, categoria)=('$_SESSION[id_ci]', '$cate') ";
        $res = $conexion->query($sql2);
        $cou = mysqli_num_rows($res);
        if($cou==2){
            $message='Solo puede votar 2 veces';
        }
        if($cou<=1){
            $sqla = "SELECT * FROM votacion WHERE (ci_miembro, id_ci_candidato, categoria)=('$_SESSION[id_ci]','$idCi', '$cate') ";
            $re = $conexion->query($sqla);
            $co = mysqli_num_rows($re);
            if($co == 1)
            {
                $message="Ya Voto por este candidato";
            }
            else
            {
            if ($co == 0) {
                $votos=@$_POST['voto'];
                $total= $votos + 1;
                $query = "INSERT INTO votacion (id_votacion, ci_miembro, nombre_miembro, id_ci_candidato, nombre_candidato, categoria)
                                VALUES ('','$_SESSION[id_ci]','$_SESSION[nombre]', '$idCi', '$nombre', '$cate')";
                $query2 = "UPDATE candidato SET total_votos ='$total' WHERE id_ci = '$idCi'";
    
                if ($conexion->query($query) === TRUE and $conexion->query($query2)===TRUE) {
                    //echo "<script>alert('Usuario Creado Exitosamente!');</script>";
                    $message='Voto Exitoso';
                }
    
                else {
                    //echo "<script>alert('Error al crear el usuario. $query <br> $conexion->error');</script>";
                    $message='Error al Votar. $query <br> $conexion->error';
                }
            }
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
                
                require "../header/elecciones_menu.php";
                ?>  
    
    <header>
        
        <div class="textos">
            <h1 class="titulo">Area Administrativa</h1>
            <h2 class="subtitulo">Elecciones Anciano</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    


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
            
           
            
            echo "<center>";
            //$row = $mysqli->query($sql)->fetch_array();
            while($row = @mysqli_fetch_assoc($result))
            {
                ?>
                    <div class='contenedor-form'>
                    <div class='formulario' style='text-align:center;'>
                    <form method='post' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
                <?php
                $ci = $row["id_ci"]; 
                $foto= $row["foto"];
                $nom=$row['nombre_completo'];
                $cat=$row['categoria'];
                $voto=$row['total_votos'];
                echo "";
                ?>
                <img class='Image' value='asda' name='img' src="data:image/jpg;base64,<?php echo base64_encode($foto);?>"/> <br><br> 
                <h3> <?php echo $nom ?><br></h3>
                <input type=hidden name=nom value="<?php echo $nom ?>">
                <input type=hidden name=ci value="<?php echo $ci ?>"> 
                <input type=hidden name=categoria value="<?php echo $cat ?>"> 
                <input type=hidden name=voto value="<?php echo $voto ?>"> 
                <input type='submit' name='submit' value="Votar">
                <?php
                echo "</form>
                </div></div>";
            }
            echo"</center>";
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

