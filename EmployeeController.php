<?php
session_start();
include_once 'conexion.php';
include_once 'Employee.php';

$database = new Database();
$db = $database->getConnection();
$employee = new Employee($db);

$action = $_POST['action'];

switch($action) {
    case 'create':
        $employee->Nombre = $_POST['Nombre'];
        $employee->Telefono = $_POST['Telefono'];
        $employee->Email = $_POST['Email'];
        $employee->Fecha = $_POST['Fecha'];
        $employee->Ciudad = $_POST['Ciudad'];

        if($employee->create()){
            $_SESSION['message'] = "Empleado creado.";

        } else {
            $_SESSION['message'] = "No se pudo crear al empleado.";
        }
        header("Location: index.php"); // Redirigir después de crear
        break;

    case 'update':
        $employee->id = $_POST['id'];
        $employee->Nombre = $_POST['Nombre'];
        $employee->Telefono = $_POST['Telefono'];
        $employee->Email = $_POST['Email'];
        $employee->Fecha = $_POST['Fecha'];
        $employee->Ciudad = $_POST['Ciudad'];

        if($employee->update()){
            $_SESSION['message'] = "Empleado actualizado."; 
        } else {
            $_SESSION['message'] = "No se pudo actualizar al empleado.";
        }
        header("Location: index.php"); // Redirigir después de actualizar
            
        break;

    case 'delete':
        $employee->id = $_POST['id'];

        if($employee->delete()){
            $_SESSION['message'] = "Empleado eliminado.";
        } else {
            $_SESSION['message'] ="No se pudo eliminar al empleado.";
        }
        header("Location: index.php"); // Redirigir después de eliminar
         
        break;

    // etc...

    default:
    $_SESSION['message'] = "Acción no reconocida.";
        break;
}
exit();
?>