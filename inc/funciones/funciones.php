<?php

error_reporting(E_ALL ^ E_NOTICE);

//Funcion para consultar a la BD
function obtenerImportaciones() {
    //Incluir la conexion
    require 'db.php';

    try {
        //Realizar script de consulta a la BD
        return $conn->query("SELECT vw_productosvalueyear.product, vw_productosvalueyear.year, SUM(value) AS total FROM vw_productosvalueyear GROUP BY vw_productosvalueyear.product ORDER BY total DESC LIMIT 0, 10");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage() . "<br>";
        return false;
    }
}

function obtenerPartner() {
    require 'db.php';

    try {
        return $conn->query("SELECT partners.partner FROM partners");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage() . "<br>";
        return false;
    }
}

function obtenerYear() {
    require 'db.php';

    try {
        return $conn->query("SELECT imports.year, partners.partner FROM imports INNER JOIN partners ON imports.partner_code = partners.partner_code GROUP BY imports.year HAVING COUNT(*)>1");
    } catch (Exception $e) {
        echo "Error!" . $e->getMessage() . "<br>";
        return false;
    }
}

// SELECT imports.year, partners.partner FROM imports INNER JOIN partners ON imports.partner_code = partners.partner_code GROUP BY imports.year HAVING COUNT(*)>1

?>