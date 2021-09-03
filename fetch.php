<?php

include("inc/funciones/db.php");
if(isset($_POST['request'])){

    $request = $_POST('request');
    $query = "SELECT * FROM imports WHERE year = '$request'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
}
?>

<table class="table">
    <?php
    if($count){

    ?>
    <thead>
        <tr>
            <th>Products</th>
            <th>Value</th>
        </tr>

        <?php
    } else {
        echo "Error, no ha sido encontrado";
    }
        ?>
    </thead>

    <tbody>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            
        ?>
        <?php $importaciones = obtenerImportaciones();

        if($importaciones->num_rows) {

            foreach($importaciones as $importacion) { ?>
        <tr>
            <td><?php echo $importacion['product']; ?></td>
            <td id="<?php echo $importacion['year']; ?>" class="total"><?php echo $importacion['total']; ?></td>
        </tr>

        <?php }
        } ?>

        <?php
        }
        ?>
    </tbody>
</table>