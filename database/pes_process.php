<?php
$servername="";
$username="";
$password="";
$dbname="";
$conn = mysqli_connect($servername, $username, $password, $dbname);
/*
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}*/
$sql="INSERT INTO pes_registro (pes_area, pes_titulo, pes_detalles, pes_fecha, pes_estado, pes_activo) ";
$sql.="VALUES (".$_POST['area'].",".$_POST['titulo'].", ".$_POST['detalles'];
$sql.=", ".date("Y-m-d H:i:s");
$sql.=", 1, 1)";
echo $sql;
/*
echo date("Y-m-d h:i:s");
INSERT INTO `pes_registro` (`pes_id`, `pes_area`, `pes_titulo`, `pes_detalles`, `pes_fecha`, `pes_estado`, `pes_activo`) 
VALUES (NULL, '1', 'Encaje legal', 'Explicar como se identifican los creditos con encaje legal', '2020-09-02 22:33:53', '1', '1')
*/
?>