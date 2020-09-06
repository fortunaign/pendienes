<h2><?php echo $_GET['detai']; ?></h2>
<form action="database\pes_process.php" method="POST">
    <input type="hidden" name="<?php echo $_GET['area']; ?>">
    <label for="">Nombre</label><br>
    <input type="text" name="details" id="" value="">
    <br>
    <input type="submit" name="add_details" value="Guardar">
</form>