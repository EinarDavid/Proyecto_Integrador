<?php 
        
                           
?>
<!DOCTYPE html>
<!--<html lang="en">

<head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0 ,maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title></title>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body >
    
bg-light-->
		
		
   
    
        <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #030200; z-index: 13;">
            <a class="navbar-brand" href="../administracion/administracion.php" style="color: #F0B642;" >Iglesia Sebastian Pagador</a>
                <button class="navbar-toggler icono" style = " border: 1px solid #fff;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon " style ="" ></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                   <!-- <li class="nav-item active">
                        <a class="nav-link" href="../administracion/administracion.php">Registro-Membresia <span class="sr-only">(current)</span></a>
                    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>-->
                    
                    <li class="nav-item dropdown" >
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registro-Membresia
                        </a>
                        <div class="dropdown-menu"  aria-labelledby="navbarDropdownMenuLink">
                            <!--<a class="dropdown-item" href="../Registro_Bautizo/Reg_Bautizo.php">Reg. por Bautizo</a>
                            <a class="dropdown-item" href="../Registro_Transferencia/Reg_Transfe.php">Reg. por Transferencias</a>
                            <a class="dropdown-item" href="../Registro_Solicitud/Reg_Solicitud.php">Reg. por Solicitud</a>
                            <a class="dropdown-item" href="../Registro_transferidos/Reg_transferidos.php">Reg. de Tranferidos</a>-->
                            <a class="dropdown-item" href="../Registro_Disciplinas/Reg_Disciplinas.php">Reg. de Disciplinas</a>
                            <a class="dropdown-item" href="../Filtro_Registro/Filtro.php">Filtrar</a>
                            
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Santa Cena
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <!--<a class="dropdown-item" href="../Reg_SantaCena/Reg_SCena.php">Registro</a>-->
                            <a class="dropdown-item" href="../Filtro_SCena/Filtro_SC.php">Filtrar</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Niños
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <!--<a class="dropdown-item" href="../Registro_pre_ninos/Reg_pre_ninos.php">Registro</a>-->
                            <a class="dropdown-item" href="../Filtro_Ninos/Filtro.php">Filtrar</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a  style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Matrimonio
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <!--<a class="dropdown-item" href="../Registro_Matrimonio/Reg_matri.php">Registro</a>-->
                            <a class="dropdown-item" href="../Filtro_Matrimonio/Filtro.php">Filtrar</a>
                        </div>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Inventario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <a class="dropdown-item" href="#">Registro</a>
                            <a class="dropdown-item" href="#">Filtrar</a>
                        </div>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Usuarios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <a class="dropdown-item" href="../Registro_Usuario/Reg_us.php">Registro</a>
                            <a class="dropdown-item" href="../Eliminar_Usuario/Eliminar_us.php">Eliminar</a>
                        </div>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Noticias
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <a class="dropdown-item" href="../Registro_Noticias/Reg_not.php">Registro</a>
                            <a class="dropdown-item" href="../Eliminar_Noticia/Eliminar_not.php">Eliminar</a>
                        </div>
                    </li>-->
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../login_administracion/cerrar_secion.php">Cerrar Secion</a>
                    </li> 
                    <li class="nav-item">
                        <a style="color:rgb(215, 162, 57);" class="nav-link" > <?php echo  $_SESSION["nombre"];?>

                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
   
    
		
<!--</body>-->

</html>