<?php 
    include 'inc/layout/header.php';
    include 'inc/funciones/funciones.php';
?>

<div class="contenedor-barra">
    <h1>Panama Imports</h1>
</div>

<!-- Parte para seleccionar año -->
<div class="contenedor sombra">
    <form id="formulario" action="POST">
        <div class="campos">

            <div class="campo">
                <label for="year">Year:</label>
                <select name="year" id="year">
                    
                <?php $filtros = obtenerYear();

                if($filtros->num_rows) {
                    foreach($filtros as $filtro) {?>
                    <option value="<?php echo $filtro['year']; ?>"><?php echo $filtro['year']; ?></option>
                    <?php }
            } ?>
                </select>
            </div>

            <div class="campo">
                <label for="partner">Country:</label>
                <select name="partner" id="partner">
                <?php $filtros = obtenerPartner();

                if($filtros->num_rows) {
                    foreach($filtros as $filtro) {?>
                    <option value="<?php echo $filtro['partner']; ?>"><?php echo $filtro['partner'] ?></option>
                    <?php }
            } ?>
                </select>
            </div>
            

        </div>
    </form>
</div>


<!-- Parte para visualizar -->
<div class="contenedor sombra imports">
    <div class="contenedor-imports">
        <h2>Top 10 Imports</h2>
        <div class="contenedor-tabla">
            <table id="listado-imports" class="listado-imports">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Value</th>
                    </tr>
                </thead>

                <tbody>
                
                <?php $importaciones = obtenerImportaciones();

                    if($importaciones->num_rows) {

                        foreach($importaciones as $importacion) { ?>
                    <tr>
                        <td><?php echo $importacion['product']; ?></td>
                        <td id="<?php echo $importacion['year']; ?>" class="total"><?php echo $importacion['total']; ?></td>
                    </tr>

                    <?php }
                    } ?>

                </tbody>

            </table>
        </div>
    </div>
</div>


<?php include 'inc/layout/footer.php' ?>