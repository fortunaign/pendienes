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
            <td>Area</td>
            <td>Titulo</td>
        </tr>
    <?php
    require 'database\conn.php';
    $sql="SELECT * FROM pes_general WHERE pes_activo=0";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?php echo $row['pes_detalles']; ?></td>
            <td><a href="pes_coment.php?id=<?php echo $row['pes_id'];?>"><?php echo $row['pes_titulo'];?></a></td>
        </tr>
    <?php
        }
    }
    $conn->close();
    ?>
    </table>
</body>
</html>