<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio | Pendientes</title>
</head>
<body>
    <h1>Lista pendientes</h1>
    <a href="pes_input.php">Nuevo</a><br>
    <br>
    <table>
        <tr>
            <td>Titulo</td>
            <td>Fecha</td>
        </tr>
    <?php
    $servername="127.0.0.1";
    $username="root";
    $password="";
    $dbname="pendientes";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    $sql="SELECT * FROM pes_registro";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><a href="pes_coment.php?id=<?php echo $row['pes_id'];?>"><?php echo $row['pes_titulo'];?></a></td>
            <td><?php echo $row['pes_fecha'];?></td>
        </tr>
    <?php
        }
    }
    $conn->close();
    ?>
    </table>
</body>
</html>