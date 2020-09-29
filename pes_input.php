<?php
require 'pes_navbar.php';
$area=$titulo=$detalles="";
?>  
<div class="row">
    
    <div class="col-12 my-4">
        <h1 class="">
            Nuevo
        </h1>
    </div>
    
    <div class="col-12">
    <form action="database\pes_process.php" method="POST">
    <a href="pes_details.php?detai=Nueva Area&tipo=area"><label for="" class="">Departamento</label></a>
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
    
    <div class="form-group">
        <label for="">Titulo</label>
        <input type="text" name="titulo" values="<?php echo $titulo; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="">Detalles</label>
        <textarea name="detalles" id="" cols="30" rows="5" values="<?php echo $detalles; ?>" class="form-control" required></textarea>
    </div>
    <input type="submit" value="Guardar" name="pes_registro" class="btn btn-primary">
    </form>    
    </div>

</div>

<?php require 'pes_footer.php'; ?>