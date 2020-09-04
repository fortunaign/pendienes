<?php

$titulo="";
$detalles="";

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="pendientes";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

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
<?php
    }
}
?>
<form action="database\pes_process.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<label for="">Comentar</label>
<br>
<textarea name="comentario" id="" cols="30" rows="5"></textarea>
<br>
<input type="submit" value="Guardar" name="pes_coment">
</form>

<h3>Comentarios</h3>

<?php
$sql="SELECT * FROM pes_coment WHERE pes_id=".$_GET['id'];
$result=$conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
<p>
<?php echo $row['pes_coment']; ?>
<br>
<?php echo $row['pes_fecha']; ?>
</p>
<?php
    }
}
$conn->close();
?>