<?php

    //INICIALIZAR LA SESION
    session_start();
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: ../elecciones/elecci.php");
        exit;
    }

//require_once "conexion.php";

        $conexion = new mysqli("localhost", "root", "", "igle");

        if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
        }

$id_ci = $password ="";
$id_ci_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    if(empty(trim($_POST["id_ci"]))){
        $id_ci_err = "Por favor, ingrese el correo electronico";
    }else{
        $id_ci = trim($_POST["id_ci"]);
    }
    
    /*if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, ingrese una contraseña";
    }else{
        $password = trim($_POST["password"]);
    }*/
    
    
    

    //VALIDAR CREDENCIALES
    if(empty($id_ci_err) ){ //&& empty($password_err
        
        //$sql = "SELECT id, usuario, email, clave FROM usuarios WHERE email = ?";

        $sql = "SELECT id_ci,nombre, ap_paterno, ap_materno FROM membresia WHERE id_ci = ?";
        
        if($stmt = mysqli_prepare($conexion, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_idci);
            
            $param_idci = $id_ci;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
            }
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                mysqli_stmt_bind_result($stmt, $id_ci,$nombre, $ap_paterno,$ap_materno);
                //mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    /*if(password_verify($password, $hashed_password) )
                    {*/
                        
                            session_start();
                        
                            // ALMACENAR DATOS EN VARABLES DE SESION
                            $_SESSION["loggedin"] = true;
    
                            $_SESSION["id_ci"] = $id_ci;
                            
                            $_SESSION["nombre"] = $nombre." ".$ap_paterno." ".$ap_materno;
                            
                            
                            header("location: ../elecciones/elecci.php");
                            
                            
                        
                        
                    /*}else{
                        $password_err = "La contraseña que has introducido no es valida";
                    }*/
                    
                } 
            }else{
                    $id_ci_err = "El usuario no a sido creado.";
                }
            
        }else{
                    echo "UPS! algo salio mal, intentalo mas tarde";
                }
    }
    
    mysqli_close($conexion);
    
}

?>

