<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        .delete-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <?php
        include_once 'conexion.php';
        include_once 'Employee.php';

        $database = new Database();
        $db = $database->getConnection();
        $employee = new Employee($db);

        // Mostrar la confirmación de eliminación
        $employee->id = $_GET['id'];
        echo "<p>¿Estás seguro de que deseas eliminar al empleado con ID " . $employee->id . "?</p>";
        echo "<form action='EmployeeController.php' method='POST'>
                <input type='hidden' name='action' value='delete'>
                <input type='hidden' name='id' value='" . $employee->id . "'>
                <input type='submit' value='Eliminar' class='btn btn-danger'>
                <a href='index.php' class='btn btn-secondary'>Cancelar</a>
              </form>";
        ?>
    </div>
</body>
</html>
