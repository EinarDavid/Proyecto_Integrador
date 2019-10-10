<?php
    if(isset($_POST['Des'])){
        
        if ($_POST) {
            $mes = $_POST['Busca'];
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
        
    $conexion = new mysqli("localhost", "root", "", "igle");
    if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
    }
        
        //$fecha1=$_POST['fecha_in'];
        //$fecha2=$_POST['fecha_fin'];
        // NOMBRE DEL ARCHIVO Y CHARSET
        header('Content-Type:text/csv; charset=latin1');
        header('Content-Disposition: attachment; filename="Reporte_S.Cena.csv"');
     
        // SALIDA DEL ARCHIVO
        $delimiter = ";";
        $salida=fopen('php://output', 'w');
        // ENCABEZADOS
        $fields = array('Id Santa Cena','Ci','Nombre Completo','Fecha','Hora');
        fputcsv($salida, $fields,$delimiter);
        // QUERY PARA CREAR EL REPORTE
        
        $reporteCsv=$conexion->query("SELECT *  FROM santa_cena where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_ci");
        
        while($filaR= $reporteCsv->fetch_assoc()){
            fputcsv($salida, array($filaR['id_santacena'], 
                                    $filaR['id_ci'],
                                    $filaR['nombre'],
                                    $filaR['fecha'],
                                    $filaR['hora']),$delimiter);
        }
    }
?>