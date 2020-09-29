<?php
require 'conn.php';

if(isset($_POST['pes_registro'])){
    $stmt=$conn->prepare("CALL add_registro(?,?,?,?,?)");
    $area=$_POST['area'];
    $titulo=$_POST['titulo'];
    $detalles=$_POST['detalles'];
    $estado=1;
    $activo=true;
    $stmt->bind_param("issib", $area, $titulo, $detalles, $estado, $activo);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location:../index.php');
}

if(isset($_POST['pes_coment'])){
    $stmt=$conn->prepare("CALL add_coment(?,?)");
    $id=$_POST['id'];
    $comentario=$_POST['comentario'];
    $stmt->bind_param("is", $id, $comentario);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header('location:../pes_coment.php?id='.$id);
}

if(isset($_POST['add_details'])){
    $sql="INSERT INTO pes_areas(pes_area) VALUES('".$_POST['details']."')";
    if($conn->query($sql) === TRUE){
        echo "Agregado";
    }else{
        echo "ERROR: ".$sql."<br>".$conn->error;
    }
    $conn->close();
    header('location:../pes_input.php');
}

if(isset($_POST['pes_cerrar'])){
    $sql="UPDATE pes_registro SET pes_activo=1 WHERE pes_id=".$_POST['pes_id'];
    if($conn->query($sql) === TRUE){
        echo "Agregado";
    }else{
        echo "ERROR: ".$sql."<br>".$conn->error;
    }
    $conn->close();
    header('location:../index.php');
}


/*
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
$sql="INSERT INTO pes_registro (pes_area, pes_titulo, pes_detalles, pes_fecha, pes_estado, pes_activo) ";
$sql.="VALUES (".$_POST['area'].",".$_POST['titulo'].", ".$_POST['detalles'];
$sql.=", ".date("Y-m-d H:i:s");
$sql.=", 1, true)";
echo $sql;
if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
//
/*
SET @p0='1'; SET @p1='Hola mundo'; SET @p2='Prueba de procedimiento'; SET @p3='1'; SET @p4='true'; CALL `add_registro`(@p0, @p1, @p2, @p3, @p4);
echo date("Y-m-d h:i:s");
INSERT INTO `pes_registro` (`pes_id`, `pes_area`, `pes_titulo`, `pes_detalles`, `pes_fecha`, `pes_estado`, `pes_activo`) 
VALUES (NULL, '1', 'Encaje legal', 'Explicar como se identifican los creditos con encaje legal', '2020-09-02 22:33:53', '1', '1')
*/
?>