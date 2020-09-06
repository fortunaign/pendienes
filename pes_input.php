<?php
$area=$titulo=$detalles="";
?>
<a href="index.php">Inicio</a>
<h2>Nuevo pendiente</h2>
<form action="database\pes_process.php" method="POST">
<label for="">Area</label>
<br>
<select name="area" id="">
<?php 
require 'database\conn.php';
$sql="SELECT * FROM pes_areas";
$result=$conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
<option value="<?php echo $row['pes_id']; ?>"><?php echo $row['pes_detalles']; ?></option>
<?php
    }
}
?>
</select>
<a href="pes_details.php?detai=Nueva Area&tipo=area">Agregar</a>
<br>
<label for="">Titulo</label>
<br>
<input type="text" name="titulo" values="<?php echo $titulo; ?>">
<br>
<label for="">Detalles</label>
<br>
<textarea name="detalles" id="" cols="30" rows="10" values="<?php echo $detalles; ?>"></textarea>
<br>
<input type="submit" value="Guardar" name="pes_registro">
</form>