<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    include_once 'conexion.php';
    include_once 'Employee.php';

    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);

    echo "<h1 class='text-center'>Lista de Empleados</h1>";
    echo "<div class='text-center mb-3'>";
    echo "<a href='create.php' class='btn btn-success'>Crear Nuevo Empleado</a>";
    echo "</div>";
    
    $stmt = $employee->read();
    if($stmt->rowCount() > 0) {
        echo "<table id='employees' class='table table-striped table-bordered table-hover'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Email</th>";
        echo "<th>Fecha</th>";
        echo "<th>Ciudad</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Telefono'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Fecha'] . "</td>";
            echo "<td>" . $row['Ciudad'] . "</td>";
            echo "<td>";
            echo "<a href='read_one.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Ver </a> |";
            echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar </a> |";
            echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Eliminar </a>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No se encontraron empleados.</p>";
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#employees').DataTable();
    });
    </script>
</body>
</html>