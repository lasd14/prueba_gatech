<?php

//Funcion para consultar a la BD
function obtenerImportaciones() {
    //Incluir la conexion
    include 'db.php';

    try {
        //Realizar script de consulta a la BD
        return $conn->query("SELECT vw_productosvalue.product, SUM(value) AS total FROM vw_productosvalue GROUP BY vw_productosvalue.product ORDER BY total DESC LIMIT 0, 10");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage() . "<br>";
        return false;
    }
}



?>