<?php
 $conexion = new mysqli("localhost", "root", "", "igle");
 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
 }
        if(isset($_POST['Descargar']))
        {
            // NOMBRE DEL ARCHIVO Y CHARSET
            header('Content-Type:text/csv; charset=latin1');
            header('Content-Disposition: attachment; filename="Reporte_matrimonio.csv"');

            // SALIDA DEL ARCHIVO
            $delimiter = ";";
            $salida=fopen('php://output', 'w');
            // ENCABEZADOS
            
            $fields = array('Nro','Nombre Pastor', 'Ci Esposo', 
                            'Nombre Esposo',
                            'Ci Esposa', 'Nombre Esposa', 'Fecha de Matrimonio');

                            
            fputcsv($salida, $fields,$delimiter);
            // QUERY PARA CREAR EL REPORTE
            
            $reporteCsv=$conexion->query("SELECT *  FROM matrimonio ORDER BY id_matrimonio;");
            
            while($filaR= $reporteCsv->fetch_assoc())
                fputcsv($salida, array($filaR['id_matrimonio'],
                                        $filaR['nombre_pastor'],
                                        $filaR['id_ci_esposo'],
                                        $filaR['nombre_esposo'],
                                        $filaR['id_ci_esposa'],
                                        $filaR['nombre_esposa'],
                                        $filaR['fecha_matrimonio']),$delimiter);
        }

        

?>