<?php
 $conexion = new mysqli("localhost", "root", "", "igle");
 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
 }
        if(isset($_POST['Descargar']))
        {
            // NOMBRE DEL ARCHIVO Y CHARSET
            header('Content-Type:text/csv; charset=latin1');
            header('Content-Disposition: attachment; filename="Reporte_membresia.csv"');

            // SALIDA DEL ARCHIVO
            $delimiter = ";";
            $salida=fopen('php://output', 'w');
            // ENCABEZADOS
            
            $fields = array('Nro','Ci','Nombre', 'Apellido Paterno', 
                            'Apellido Materno',
                            'Genero', 'Telefono', 'Celular',
                            'Fecha de Nacimiento','Lugar', 
                            'Fecha de Conversion', 'Fecha de Bautizo',
                            'Profesion','Ocupacion',
                            'Direccion','Estado Civil', 'Imagen', 
                            'Estado', 'miembro por');
            fputcsv($salida, $fields,$delimiter);
            // QUERY PARA CREAR EL REPORTE
            
            $reporteCsv=$conexion->query("SELECT *  FROM membresia ORDER BY ap_paterno;");
            
            while($filaR= $reporteCsv->fetch_assoc())
                fputcsv($salida, array($filaR['id_membresia'],
                                        $filaR['id_ci'],
                                        $filaR['nombre'],
                                        $filaR['ap_paterno'],
                                        $filaR['ap_materno'],
                                        $filaR['genero'],
                                        $filaR['telefono'],
                                        $filaR['celular'],
                                        $filaR['fecha_nac'],
                                        $filaR['lugar'],
                                        $filaR['fecha_conversion'],
                                        $filaR['fecha_bautizo'],
                                        $filaR['profesion'],
                                        $filaR['ocupacion'],
                                        $filaR['direccion'],
                                        $filaR['estado_civil'],
                                        //$filaR['imagen'],
                                        $filaR['estado'],
                                        $filaR['miembro_por']),$delimiter);
        }

        if(isset($_POST['Genero']))
        {
            // NOMBRE DEL ARCHIVO Y CHARSET
            header('Content-Type:text/csv; charset=latin1');
            header('Content-Disposition: attachment; filename="Reporte_por_genero.csv"');

            // SALIDA DEL ARCHIVO
            $delimiter = ";";
            $salida=fopen('php://output', 'w');
            // ENCABEZADOS
            
            $fields = array('Nro','Ci','Nombre', 'Apellido Paterno', 
                            'Apellido Materno',
                            'Genero', 'Telefono', 'Celular',
                            'Fecha de Nacimiento','Lugar', 
                            'Fecha de Conversion', 'Fecha de Bautizo',
                            'Profesion','Ocupacion',
                            'Direccion','Estado Civil', 'Imagen', 
                            'Estado', 'miembro por');
            fputcsv($salida, $fields,$delimiter);
            // QUERY PARA CREAR EL REPORTE
            if ($_POST) {
                $Genero = $_POST['Gen'];
                if($Genero=='1')
                {
                    $gen='Masculino';
                }
                if($Genero=='2'){
                    $gen='Femenino';
                }
            } 

            $reporteCsv=$conexion->query("SELECT *  FROM membresia Where genero = '$gen' ORDER BY ap_paterno;");
            
            while($filaR= $reporteCsv->fetch_assoc())
                fputcsv($salida, array($filaR['id_membresia'],
                                        $filaR['id_ci'],
                                        $filaR['nombre'],
                                        $filaR['ap_paterno'],
                                        $filaR['ap_materno'],
                                        $filaR['genero'],
                                        $filaR['telefono'],
                                        $filaR['celular'],
                                        $filaR['fecha_nac'],
                                        $filaR['lugar'],
                                        $filaR['fecha_conversion'],
                                        $filaR['fecha_bautizo'],
                                        $filaR['profesion'],
                                        $filaR['ocupacion'],
                                        $filaR['direccion'],
                                        $filaR['estado_civil'],
                                        //$filaR['imagen'],
                                        $filaR['estado'],
                                        $filaR['miembro_por']),$delimiter);
        }
        if(isset($_POST['estado']))
        {
            // NOMBRE DEL ARCHIVO Y CHARSET
            header('Content-Type:text/csv; charset=latin1');
            header('Content-Disposition: attachment; filename="Reporte_por_estado.csv"');

            // SALIDA DEL ARCHIVO
            $delimiter = ";";
            $salida=fopen('php://output', 'w');
            // ENCABEZADOS
            
            $fields = array('Nro','Ci','Nombre', 'Apellido Paterno', 
                            'Apellido Materno',
                            'Genero', 'Telefono', 'Celular',
                            'Fecha de Nacimiento','Lugar', 
                            'Fecha de Conversion', 'Fecha de Bautizo',
                            'Profesion','Ocupacion',
                            'Direccion','Estado Civil', 'Imagen', 
                            'Estado', 'miembro por');
            fputcsv($salida, $fields,$delimiter);
            // QUERY PARA CREAR EL REPORTE
            if ($_POST) {
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

            $reporteCsv=$conexion->query("SELECT *  FROM membresia Where estado_civil = '$es' ORDER BY ap_paterno;");
            
            while($filaR= $reporteCsv->fetch_assoc())
                fputcsv($salida, array($filaR['id_membresia'],
                                        $filaR['id_ci'],
                                        $filaR['nombre'],
                                        $filaR['ap_paterno'],
                                        $filaR['ap_materno'],
                                        $filaR['genero'],
                                        $filaR['telefono'],
                                        $filaR['celular'],
                                        $filaR['fecha_nac'],
                                        $filaR['lugar'],
                                        $filaR['fecha_conversion'],
                                        $filaR['fecha_bautizo'],
                                        $filaR['profesion'],
                                        $filaR['ocupacion'],
                                        $filaR['direccion'],
                                        $filaR['estado_civil'],
                                        //$filaR['imagen'],
                                        $filaR['estado'],
                                        $filaR['miembro_por']),$delimiter);
        }

?>