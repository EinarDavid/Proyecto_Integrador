<?php

    require "code-login.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log</title>
    <link rel="stylesheet" href="loge.css">
</head>
<body>

    <div class="contenedor-form">
        
        <!--<div class="toggle">
            <span> Crear Cuenta</span>
        </div>-->
        
        
        <div class="formulario">


            <h2>Login Elecciones</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method ="POST">
                <input type="number" name="id_ci" placeholder="Ci*" required>

               
                    <?php if(!empty($error)): ?>
                    <div class="mensaje">
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                <input type="submit" value="Iniciar Seción" name="submit"> <!-- submit es un boton de envio-->
                <!--<input <a href="#" role="button" >Inciar Sesión</a>>-->
                <br>
                
                
                <?php if(!empty($id_ci_err)): ?>
                    <h3 class="subtitulo" style="color:rgb(215, 162, 57);"><?= $id_ci_err; ?></h3>
                <?php endif; ?>
            </form>
        </div>
        
       
    </div>
    <!--<script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>-->
</body>
</html>