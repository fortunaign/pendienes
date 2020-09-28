<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css\bootstrap.css">
    <link rel="stylesheet" href="js\jquery-ui.css">
    <title>Inicio | Pendientes</title>
</head>
<body>
<?php require 'pes_navbar.php'; ?>
    <div class="container">
        <div class="row">
        <div class="col-lg-12 p-3">
            <a href="pes_input.php"><button type="button" class="btn btn-primary bt-lg">
             + Nuevo pendiente
            </button></a>
        </div>
        <div class="col-lg-12">
        <?php
        require 'database\conn.php';
        $sql="SELECT * FROM pes_general WHERE pes_activo=0";
        $result=$conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
        
            <div class="m-2 p-2">
                <h5 class=""><?php echo $row['pes_titulo'];?></h5>
                <p class="">
                    <?php echo $row['pes_detalles'];?>
                        <a href="pes_coment.php?id=<?php echo $row['pes_id'];?>">Leer mas...</a>
                    <br>
                    <?php echo $row['pes_fecha'];?>
                </p>
            </div>
        <?php
            }
        }
        $conn->close();
        ?>
        </div>
        </div>
    </div>
    <script src="js\jquery-ui.js"></script>
    <script src="js\jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".lista").dialog();
    });
    </script>
</body>
</html>