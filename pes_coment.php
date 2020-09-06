<?php

$titulo="";
$detalles="";

require 'database\conn.php';

$sql="SELECT * FROM pes_registro WHERE pes_id=".$_GET['id'];
$result=$conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id=$row['pes_id'];
?>
<a href="index.php">Inicio</a>
<h2>
<?php echo $row['pes_titulo']; ?>
</h2>
<p>
<?php echo $row['pes_detalles']; ?>
</p>
<h3>
<?php echo $row['pes_fecha']; ?>
</h3>
<?php
    }
}
?>
<form action="database\pes_process.php" method="post"><input type="hidden" name="pes_id" value="<?php echo $id; ?>"><input type="submit" value="Realizado" name="pes_cerrar"></form>
<form action="database\pes_process.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label for="">Agregar Nota</label>
<br>
<textarea name="comentario" id="" cols="30" rows="5"></textarea>
<br>
<input type="submit" value="Guardar" name="pes_coment">
</form>

<h3>Notas</h3>

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