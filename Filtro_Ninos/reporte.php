<?php
 $conexion = new mysqli("localhost", "root", "", "igle");
 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
 }
        if(isset($_POST['Descargar']))
        {
            // NOMBRE DEL ARCHIVO Y CHARSET
            header('Content-Type:text/csv; charset=latin1');
            header('Content-Disposition: attachment; filename="Reporte_niños.csv"');

            // SALIDA DEL ARCHIVO
            $delimiter = ";";
            $salida=fopen('php://output', 'w');
            // ENCABEZADOS
            
            $fields = array('Nro','Ci','Nombre',  
                            'Apellido Paterno',
                            'Apellido Materno', 'Nombre Padre','Nombre Madre', 'Fecha de Nacimiento',
                            'Fecha de Presentacion', 'Numero de Registro Civil', 'Fecha de Partida', 'Nombre del Pastor');

                            
            fputcsv($salida, $fields,$delimiter);
            // QUERY PARA CREAR EL REPORTE
            
            $reporteCsv=$conexion->query("SELECT *  FROM presentacion_ninos ORDER BY id_presentacion;");
            
            while($filaR= $reporteCsv->fetch_assoc())
                fputcsv($salida, array($filaR['id_presentacion'],
                                        $filaR['ci'],
                                        $filaR['nombre'],
                                        $filaR['apellido_paterno'],
                                        $filaR['apellido_materno'],
                                        $filaR['nombre_padre'],
                                        $filaR['nombre_madre'],
                                        $filaR['fecha_nac'],
                                        $filaR['fecha_presentacion'],
                                        $filaR['num_reg_civil'],
                                        $filaR['fecha_partida'],
                                        $filaR['nombre_pastor']),$delimiter);
        }

        

?>