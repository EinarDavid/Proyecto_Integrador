<?php
$conexion = new mysqli("localhost", "root", "", "igle");
$sql ="SELECT * FROM santa_cena;";    
$result = $conexion->query($sql);
$count = mysqli_num_rows($result);
$messa = 'La cantidad de miembros es: '.$count;


if(isset($_POST['submit'])){

    
    //$tbl_name = "membresia";

    if ($_POST) {
        $mes = $_POST['Buscar'];
        if($mes=='1')
        {
            $m='01';
        }
        if($mes=='2'){
            $m='02';
        }
        if($mes=='3')
        {
            $m='03';
        }
        if($mes=='4'){
            $m='04';
        }
        if($mes=='5')
        {
            $m='05';
            //$messa .= ' '.$m;
        }
        if($mes=='6'){
            $m='06';
        }
        if($mes=='7')
        {
            $m='07';
        }
        if($mes=='8'){
            $m='08';
        }
        if($mes=='9')
        {
            $m='09';
        }
        if($mes=='10'){
            $m='10';
        }
        if($mes=='11')
        {
            $m='11';
        }
        if($mes=='12'){
            $m='12';
        }
    }

    $year = date('Y');
    $day1 = date("d", mktime(0,0,0, $m+1, 0, $year));
    $fecha2 = date('Y-m-d', mktime(0,0,0, $m, $day1, $year));
    $fecha1 = date('Y-m-d', mktime(0,0,0, $m, 1, $year));

    //$messa .= ' ' .$fecha1 .' ';
    //$messa .=$fecha2 .'';
    $conexion = new mysqli("localhost", "root", "", "igle");
    if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
    }
    
    $sql="SELECT *  FROM santa_cena where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_ci;";

    $result = $conexion->query($sql);
    $count = mysqli_num_rows($result);
    $messa = 'La cantidad de miembros que asistieron es: '.$count;
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
    
    <header>
        
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
        <div class="textos">
            <h1 class="titulo">Area Administrativa</h1>
            <h2 class="subtitulo">Filtros de Santa Cena</h2>
                <?php if(!empty($message)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $message; ?></h3>
                <?php endif; ?>
        </div>
        <div class="sesgoabajo"></div>
    </header>
    <div class="contenedor-form">
        <div class="formulario"style="text-align:center;">
            <h2>Filtros</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <!--<form action="reporte_SC.php" method="post" >   --> 
               
                    <p><h3>Seleccione el Mes*</h3></p>
                    <select name="Buscar" required>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                   
                <div class="">
                    <input type="submit" value="Buscar" name="submit"><!-- submit es un boton de envio-->
                </div>                
            </form>
            <br>
            <h2>Descargar Reportes</h2>
            <form action="reporte_SC.php" method="post">
            <!--<form action="reporte_SC.php" method="post" >   --> 
                    <p><h3>Seleccione el Mes*</h3></p>
                    <select name="Busca" required>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                   
                <div class="">
                    <input type="submit" value="Descargar" name="Des"><!-- submit es un boton de envio-->
                </div>                
            </form>
           
                 
            
        </div>
    </div>
                <?php if(!empty($messa)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);text-align:center;"><?= $messa; ?></h3>
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
            
            
            echo "<center><table class='tab'><th>Id Santa Cena</th><th>CI</th>
            <th>Nombre Completo</th><th>Fecha</th><th>Hora</th>";
            //$row = $mysqli->query($sql)->fetch_array();
            while($row = mysqli_fetch_assoc($result))
            {
                echo "<tr class='tabl'><td>{$row['id_santacena']}</td> ".
                        "<td>{$row['id_ci']}</td> ".
                        "<td>{$row['nombre']}</td>". 
                        "<td>{$row['fecha']}</td> ".
                        "<td>{$row['hora']}</td></tr> ";
                        
                        
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

