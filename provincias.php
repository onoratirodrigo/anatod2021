<?php

class Provincia extends class_db{

    protected function getAllProvincias(){
        $sql = "SELECT * FROM provincias";
        $result = $this->conn->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function tablaProvincias(){
        $sql = "SELECT provincia_id, localidad_nombre,provincia_nombre, COUNT(*) as cant
                FROM clientes
                INNER JOIN localidades ON cliente_localidad = localidad_id
                INNER JOIN provincias ON localidad_provincia = provincia_id
                GROUP BY localidad_nombre";
                
              
        $result = $this->conn->query($sql);
        $numRows = $result->num_rows;
        if($numRows > 0){

            while($data = $result->fetch_assoc()){
                echo "<tr>" . "<td>" . $data['provincia_id'] . "</td>";
                echo "<td>" . $data['localidad_nombre'] . "</td>";
                echo "<td>" . $data['provincia_nombre'] . "</td>";
                echo "<td>" . $data['cant'] . "</td>" . "<tr>";
            }
        }

    }

}