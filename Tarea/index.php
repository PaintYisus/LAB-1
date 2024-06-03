<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php
    require_once 'db.php';

    $deudas = getDeudas();
    ?>
    <?php
    foreach($deudas as $deuda){
        ?>
        <table class="table table-striped-columns">
            <tr>
            <th>Nombre</th>
            <th>Cuota</th>
            <th>Capital de Cuota</th>
            <th>Fecha</th>
            </tr>
            <tr>
            <td><?=$deuda->deudor?></td>
            <td><?=$deuda->cuota?></td>
            <td><?=$deuda->cuota_capital?></td>
            <td><?=$deuda->fecha_pago?></td>
            </tr>
        </table>
    <?php
    };
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        addDeudas($_POST['deudor'], $_POST['cuota'], $_POST['cuota_capital'], $_POST['fecha_pago']);
        header('Location: index.php');
    };
        ?>

    <form action="index.php" method="post" class="container">
        <div>
            <label for="deudor" id="deudor">Nombre del deudor</label>
            <input class="form-control" type="text" id="deudor" name="deudor">
        </div>
        <div>
            <label for="cuota" id="cuota">Cuota</label>
            <input class="form-control" type="text" id="cuota" name="cuota">
        </div>
        <div>
            <label for="cuota_capital" id="cuota_capital" >Cuota Capital</label>
            <input class="form-control" type="text" name="cuota_capital" id="cuota_capital"> 
        </div>
        <div>
            <label for="fecha_pago" id="fecha_pago" >Fecha de pago</label>
            <input class="form-control" type="date" id="fecha_pago" name="fecha_pago" placeholder="YYYY-MM-DD">
        </div>
        <br>
        <button class="btn btn-success">Guardar</button>
    </form>
    </div>
</body>
</html>