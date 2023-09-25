<!DOCTYPE html>
<html>
<head>
    <title>Editar Empleado</title>
</head>
<body>
    <form action="EmployeeController.php" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" id="id" name="id"> 
        <label for="Nombre">Nombre:</label><br>
        <input type="text" id="Nombre" name="Nombre"><br>
        <label for="Telefono">Teléfono:</label><br>
        <input type="text" id="Telefono" name="Telefono"><br>
        <label for="Email">Email:</label><br>
        <input type="email" id="Email" name="Email"><br>
        <label for="Fecha">Fecha:</label><br>
        <input type="date" id="Fecha" name="Fecha"><br>
        <label for="Ciudad">Ciudad:</label><br>
        <input type="text" id="Ciudad" name="Ciudad"><br>
        <input type="submit" value="Actualizar Empleado">
    </form>
</body>
</html>