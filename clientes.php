<?php

class Cliente extends class_db{

    //prueba para listar

    public function listAllClientes(){
        $sql = "SELECT cliente_id, cliente_nombre,cliente_dni,localidad_nombre,provincia_nombre, provincia_id, localidad_id
        FROM clientes
        INNER JOIN localidades ON cliente_localidad = localidad_id
        INNER JOIN provincias ON localidad_provincia = provincia_id
        ORDER BY cliente_nombre ASC";
        $result = $this->conn->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0){
            while($data = $result->fetch_assoc()){
                echo "<tr>" . "<td>" . $data['cliente_id'] . "</td>";
                echo "<td>" . $data['cliente_nombre'] . "</td>";
                echo "<td>" . $data['cliente_dni'] . "</td>";
                echo "<td data-id='{$data['localidad_id']}'>" . $data['localidad_nombre'] . "</td>";
                echo "<td data-id='{$data['provincia_id']}'>" . $data['provincia_nombre'] . "</td>";
                echo "<td><button class='btn-modificar botoncito modif''>Modificar</button> 
                          <button type='submit' class='btn-borrar botoncito elim' data-id='{$data['cliente_id']}'>Eliminar</button></td>" . "</tr>";
            }
        }
    } 

    public function deleteCliente($id){
        $sql = "DELETE FROM clientes WHERE cliente_id = $id";
        $this->conn->query($sql);
    }

    public function altaCliente($nombre, $dni, $localidad){
        
        $query = "INSERT INTO clientes(cliente_nombre, cliente_dni, cliente_localidad) VALUES ('$nombre', '$dni', '$localidad')";
        $this->conn->query($query);

    }

    public function modificarCliente($name, $dni, $localidad, $id){

        $query = "UPDATE clientes SET cliente_nombre = '$name', cliente_dni = '$dni', cliente_localidad = '$localidad' WHERE cliente_id = $id";
        $this->conn->query($query);
    }

}