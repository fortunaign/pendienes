<?php
$area=$titulo=$detalles="";
?>
<h2>Nuevo</h2>
<form action="database\pes_process.php" method="POST">
<label for="">Area</label>
<br>
<input type="text" name="area" values="<?php echo $area; ?>">
<br>
<label for="">Titulo</label>
<br>
<input type="text" name="titulo" values="<?php echo $titulo; ?>">
<br>
<label for="">Detalles</label>
<br>
<textarea name="detalles" id="" cols="30" rows="10" values="<?php echo $detalles; ?>"></textarea>
<br>
<input type="submit" value="Guardar" name="pes_save">
</form>