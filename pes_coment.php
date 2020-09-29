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
<h2 class="display-4">
<div class="row">

    <div class="col-sm-6">
        <?php echo $row['pes_titulo']; ?>
            </h2>
            <p>
            <?php echo $row['pes_detalles']; ?>
            </p>
            <h4>
            <?php echo $row['pes_fecha']; ?>
            </h4>
            <?php
                }
            }
        ?>
        <form action="database\pes_process.php" method="post"><input type="hidden" name="pes_id" value="<?php echo $id; ?>"><input type="submit" value="Finalizar" name="pes_cerrar" class="btn btn-danger"></form>

        <form action="database\pes_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h2 for="">Agregar Nota</h2>
            <div class="form-group">
            <textarea name="comentario" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <input type="submit" value="Guardar" name="pes_coment" class="btn btn-primary">
        </form>
    </div>

    <div class="col-sm-6">
        <h3 class="display-4">Notas</h3>
        <?php
            $sql="SELECT * FROM pes_coment WHERE pes_id=".$_GET['id'];
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
            <p>
            <?php echo $row['pes_coment']; ?>
            </p>
            <h5><?php echo $row['pes_fecha']; ?></h5>
            <?php
                }
            }
            $conn->close();
        ?>
    </div>
</div>
<?php require 'pes_footer.php'; ?>