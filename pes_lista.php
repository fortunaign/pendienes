<div class="row">
    <div class="col-lg-12 p-3">
        <a href="pes_input.php"><button type="button" class="btn btn-primary bt-lg">
            + Nuevo pendiente
        </button></a>
    </div>
    <div class="col-lg-12">
    <?php
    require 'database\conn.php';
    $sql="SELECT * FROM pes_general WHERE pes_activo=0";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>

        <div class="m-2 p-2">
            <h5 class=""><?php echo $row['pes_titulo'];?></h5>
            <p class="">
                <?php echo $row['pes_detalles'];?>
                    <a href="pes_coment.php?id=<?php echo $row['pes_id'];?>">Leer mas...</a>
                <br>
                <?php echo $row['pes_fecha'];?>
            </p>
        </div>
    <?php
        }
    }
    $conn->close();
    ?>
    </div>