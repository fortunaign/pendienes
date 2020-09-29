<?php
require 'pes_navbar.php';
$area=$titulo=$detalles="";
?>  
<h2 class="display-4">Nuevo pendiente</h2>
<form action="database\pes_process.php" method="POST">
<label for="" class="">Area</label>
<div class="form-inline">
    <div class="form-group">
    <select name="area" id="" class="form-control">
    <?php 
    require 'database\conn.php';
    $sql="SELECT * FROM pes_areas";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>
    <option value="<?php echo $row['pes_id']; ?>"><?php echo $row['pes_area']; ?></option>
    <?php
        }
    }
    ?>
    </select>
    </div>
    <a href="pes_details.php?detai=Nueva Area&tipo=area"><button type="button" class="btn btn-secondary m-2">Agregar</button></a>
</div>
<div class="form-group">
    <label for="">Titulo</label>
    <input type="text" name="titulo" values="<?php echo $titulo; ?>" class="form-control">
</div>
<div class="form-group">
    <label for="">Detalles</label>
    <textarea name="detalles" id="" cols="30" rows="5" values="<?php echo $detalles; ?>" class="form-control"></textarea>
</div>
<input type="submit" value="Guardar" name="pes_registro" class="btn btn-primary">
</form>
<?php require 'pes_footer.php'; ?>