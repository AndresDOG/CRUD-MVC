<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        form {
            width: 300px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input[type="text"], form input[type="email"], form input[type="date"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 20px;
        }

        form input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Tu código de PHP aquí -->
    <?php
    include_once 'conexion.php';
    include_once 'Employee.php';

    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);

    // Mostrar el formulario de actualización
    $employee->id = $_GET['id'];
    $employee->readOne();
    ?>
    <form action="EmployeeController.php" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?php echo $employee->id; ?>">
        <label>Nombre:</label>
        <input type="text" name="Nombre" value="<?php echo $employee->Nombre; ?>">
        <label>Teléfono:</label>
        <input type="text" name="Telefono" value="<?php echo $employee->Telefono; ?>">
        <label>Email:</label>
        <input type="email" name="Email" value="<?php echo $employee->Email; ?>">
        <label>Fecha:</label>
        <input type="date" name="Fecha" value="<?php echo $employee->Fecha; ?>">
        <label>Ciudad:</label>
        <input type="text" name="Ciudad" value="<?php echo $employee->Ciudad; ?>">
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
