<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border: none;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #4CAF50;
            color: white;
        }
        .detail-field {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include_once 'conexion.php';
        include_once 'Employee.php';

        $database = new Database();
        $db = $database->getConnection();
        $employee = new Employee($db);

        $employee->id = $_GET['id'];
        $employee->readOne();
        ?>
        
        <div class="card">
            <div class="card-header">
                Detalles del Empleado
            </div>
            <div class="card-body">
                <p><span class="detail-field">ID:</span> <?php echo $employee->id; ?></p>
                <p><span class="detail-field">Nombre:</span> <?php echo $employee->Nombre; ?></p>
                <p><span class="detail-field">Teléfono:</span> <?php echo $employee->Telefono; ?></p>
                <p><span class="detail-field">Email:</span> <?php echo $employee->Email; ?></p>
                <p><span class="detail-field">Fecha:</span> <?php echo $employee->Fecha; ?></p>
                <p><span class="detail-field">Ciudad:</span> <?php echo $employee->Ciudad; ?></p>
            </div>
        </div>

    </div>
</body>
</html>
