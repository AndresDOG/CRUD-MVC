<!DOCTYPE html>
<html>
<head>
    <title>Crear Empleado </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="EmployeeController.php" method="post">
        <input type="hidden" name="action" value="create">
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono:</label>
            <input type="text" id="Telefono" name="Telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" class="form-control">
        </div>
        <div class="form-group">
            <label for="Fecha">Fecha:</label>
            <input type="date" id="Fecha" name="Fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="Ciudad">Ciudad:</label>
            <input type="text" id="Ciudad" name="Ciudad" class="form-control">
        </div>
        <input type="submit" value="Crear Empleado" class="btn btn-primary"> 
    </form>
</body>
</html>