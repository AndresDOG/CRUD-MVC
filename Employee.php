<?php
class Employee {
    private $conn;
    private $table_name = 'myTable';

    // Propiedades del objeto
    public $id;
    public $Nombre;
    public $Telefono;
    public $Email;
    public $Fecha;
    public $Ciudad;

    // Constructor con $db como conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Crear empleado
    // Crear un registro sin especificar el ID
public function create() {
    $query = "INSERT INTO " . $this->table_name . " SET Nombre=:Nombre, Telefono=:Telefono, Email=:Email, Fecha=:Fecha, Ciudad=:Ciudad";
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->Nombre=htmlspecialchars(strip_tags($this->Nombre));
    $this->Telefono=htmlspecialchars(strip_tags($this->Telefono));
    $this->Email=htmlspecialchars(strip_tags($this->Email));
    $this->Fecha=htmlspecialchars(strip_tags($this->Fecha));
    $this->Ciudad=htmlspecialchars(strip_tags($this->Ciudad));

    // bind values
    $stmt->bindParam(":Nombre", $this->Nombre);
    $stmt->bindParam(":Telefono", $this->Telefono);
    $stmt->bindParam(":Email", $this->Email);
    $stmt->bindParam(":Fecha", $this->Fecha);
    $stmt->bindParam(":Ciudad", $this->Ciudad);

    if($stmt->execute()){
        return true;
    }
    return false; 
}


    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Leer un solo empleado
    public function readOne(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row){
            $this->Nombre = $row['Nombre'];
            $this->Telefono = $row['Telefono'];
            $this->Email = $row['Email'];
            $this->Fecha = $row['Fecha'];
            $this->Ciudad = $row['Ciudad'];
        }
    }

    // Actualizar empleado
    public function update(){
        $query = "UPDATE " . $this->table_name . "
                SET 
                    Nombre = :Nombre,
                    Telefono = :Telefono,
                    Email = :Email,
                    Fecha = :Fecha,
                    Ciudad = :Ciudad
                WHERE 
                    id = :id";

        $stmt = $this->conn->prepare($query);

        $this->Nombre=htmlspecialchars(strip_tags($this->Nombre));
        $this->Telefono=htmlspecialchars(strip_tags($this->Telefono));
        $this->Email=htmlspecialchars(strip_tags($this->Email));
        $this->Fecha=htmlspecialchars(strip_tags($this->Fecha));
        $this->Ciudad=htmlspecialchars(strip_tags($this->Ciudad));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":Telefono", $this->Telefono);
        $stmt->bindParam(":Email", $this->Email);
        $stmt->bindParam(":Fecha", $this->Fecha);
        $stmt->bindParam(":Ciudad", $this->Ciudad);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // Borrar empleado
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?> 