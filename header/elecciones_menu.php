<?php 
             
                           
        ?>
<!DOCTYPE html>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light " style="background-color: #030200; z-index: 13;">
            <a class="navbar-brand" href="../administracion/administracion.php" style="color: #F0B642;" >Iglesia Sebastian Pagador</a>
                <button class="navbar-toggler icono" style = " border: 1px solid #fff;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon " style ="" ></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    
                    <!--<li class="nav-item dropdown">
                        <a style="color: #fff;" class="nav-link dropdown-toggle" href="../administracion/administracion.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reg. de Candidatos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            
                            <a class="dropdown-item" href="../Registro_Candidatos/Reg_can.php">Registro</a>
                            <a class="dropdown-item" href="../Eliminar_Usuario/Eliminar_us.php">Eliminar</a>
                        </div>
                    </li>-->
                   
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_anciano/Filtro.php">Anciano</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_diacono/Filtro.php">Diacono</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_diaconisa/Filtro.php">Diaconisa</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_tesorero/Filtro.php">Tesorero</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_superintendente/Filtro.php">Super_Intendente</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../Filtro_elec_jovenes/Filtro.php">Jovenes</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #fff;" class="nav-link" href="../login_elecciones/cerrar_secion.php">Cerrar Secion</a>
                    </li>
                    <li class="nav-item">
                        <a style="color:rgb(215, 162, 57);" class="nav-link" > <?php  echo  $_SESSION["nombre"];?>

                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
   
    
		
<!--</body>-->

</html>