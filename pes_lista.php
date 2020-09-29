<div class="row">
    <div class="col-12">
        <h1 class="display-3 my-4">
            Apuntes
        </h1>
        <a href="pes_input.php" class="">
            <button type="button" class="btn btn-primary bt-lg my-4">
                <strong>+</strong> Nuevo
            </button>
        </a>
    </div>
    
    <?php
    require 'database\conn.php';
    $sql="SELECT * FROM pes_general WHERE pes_activo=0";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>

    <div class="col-12 col-md-4 col-lg-4">
        <p>
            <strong><?php echo $row['pes_titulo'];?></strong>
            <a href="pes_coment.php?id=<?php echo $row['pes_id'];?>">Leer mas..</a>
            <br>
            <span class="text-muted text-c"><?php echo $row['pes_fecha']." | ".$row['pes_hora'];?></span>
        </p>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <p class="text-muted text-c"><?php echo $row['pes_area'];?></p>
    </div>

    <?php
        }
    }
    $conn->close();
    ?>
</div>