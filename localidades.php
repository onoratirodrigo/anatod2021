<?php

class Localidad extends class_db{

    public function getAllLocalidades(){
        $result = $this->conn->query("SELECT localidad_id, localidad_nombre, provincia_nombre
                                        FROM localidades
                                        INNER JOIN provincias ON provincia_id = localidad_provincia
                                        ORDER BY localidad_nombre");
        $numRows = $result->num_rows;
        if($numRows > 0){

            $l_localidades = "<option value=''>Selecciona una localidad</option>";

            while($row = $result->fetch_assoc()){
                $l_localidades .= "<option value='$row[localidad_id]'>$row[localidad_nombre] ($row[provincia_nombre])</option>";
            }

            $l_localidades .= "</select>";

            echo $l_localidades;
        }
    }
}