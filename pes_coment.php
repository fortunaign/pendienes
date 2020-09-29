<?php
require 'pes_navbar.php';
$titulo="";
$detalles="";
require 'database\conn.php';
$sql="SELECT * FROM pes_registro WHERE pes_id=".$_GET['id'];
$result=$conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id=$row['pes_id'];
?>
<div class="row">
    <div class="col-sm-6">
        <div class="col-12 my-4">
            <form action="database\pes_process.php" method="post" class="my-3"><input type="hidden" name="pes_id" value="<?php echo $id; ?>"><input type="submit" value="Finalizar" name="pes_cerrar" class="btn btn-danger"></form>
            <h1><?php echo $row['pes_titulo']; ?></h1>
            <p><?php echo $row['pes_detalles']; ?></p>
            <p><?php echo $row['pes_fecha']." | ".$row['pes_hora']; ?></p>
        </div>
    <?php
            }
        }
    ?>
        <div class="col-12">
            <form action="database\pes_process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h4 for="" class="my-3">Agregar Nota</h4>
                <div class="form-group">
                <textarea name="comentario" id="" cols="20" rows="5" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Guardar" name="pes_coment" class="btn btn-primary">
            </form>
        </div>
    </div>    
    <div class="col-sm-6">
        <h4 class="my-3">Notas</h4>     
        <?php
            $sql="SELECT * FROM pes_coment WHERE pes_id=".$_GET['id'];
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
            <div class="col-12 alert alert-info">
                <?php echo $row['pes_coment']; ?>
                <br>
                <strong><?php echo $row['pes_fecha']." | ".$row['pes_hora']; ?></strong>
            </div>
            <?php
                }
            }
            $conn->close();
        ?>
    </div>
</div>
<?php require 'pes_footer.php'; ?>