<?php
    function getDB(){
        $db = new PDO ('mysql:host=localhost;dbname=db_lab#1;charset=utf8', 'root', '');
        return $db;
    }

    function getDeudas(){
        $db = getDB();
        $sentencia = $db->prepare("select * from pagos");
        $sentencia->execute();
        $deudas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $deudas;
    }

    function addDeudas($deudor, $cuota, $cuota_capital, $fecha_pago){
        $db = getDb();
        $sentencia = $db->prepare("insert into pagos (deudor, cuota, cuota_capital, fecha_pago) values(?, ?, ?, ?)");
        $sentencia->execute([$deudor, $cuota, $cuota_capital, $fecha_pago]);
    }

?>