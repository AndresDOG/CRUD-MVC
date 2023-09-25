# CRUD-MVC
Este es un CRUD basico aplicando el modelo vista controlador.

*Este sistema CRUD (Crear, Leer, Actualizar, Borrar) se basa en el lenguaje de programación PHP 
y utiliza una base de datos MySQL para almacenar la información de los empleados.
 Aquí hay un desglose de la lógica y las herramientas utilizadas en este sistema:
-PHP
-Mysql
-PDO (PHP Data Objects)
-Patrón de diseño MVC (Modelo-Vista-Controlador)
-Bootstrap y CSS

*En resumen, el flujo de la lógica para una operación CRUD típica en este sistema sería el siguiente:

El usuario interactúa con la interfaz de usuario (por ejemplo, llena un formulario para crear un nuevo empleado y envía el formulario).
La solicitud se envía al servidor y es manejada por un script PHP.
El script PHP crea una instancia de la clase Employee y llama a uno de sus métodos para realizar la operación CRUD correspondiente.
El método de la clase Employee ejecuta la consulta SQL apropiada a través de PDO.
Finalmente, se devuelve una respuesta al usuario y se actualiza la interfaz de usuario en consecuencia.

*En el script EmployeeController.php:

-Se inicia una sesión y se incluyen los scripts necesarios para la conexión a la base de datos y el modelo Employee.
-Se crea una nueva instancia de Database y Employee.
-Se recoge la acción deseada del formulario enviado por el usuario. Dependiendo de la acción (create, update, delete), se realiza una acción diferente en el modelo Employee.
-Si la operación en el modelo Employee es exitosa, se establece un mensaje de éxito en la variable de sesión $_SESSION['message']. Si la operación falla, -se establece un mensaje de error.
-Independientemente del resultado, el usuario es redirigido de vuelta a index.php.
-El controlador es una parte crucial de cualquier aplicación MVC, ya que maneja la lógica principal de la aplicación y coordina las interacciones entre el modelo y la vista. En este caso, EmployeeController.php es el controlador en tu aplicación CRUD (Crear, Leer, Actualizar, Eliminar).
