<?php
 class EntrenamientoModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }


    public function obtenerEntrenamientos(){
        $this->db->query("SELECT * FROM entrenamiento INNER JOIN superficie on entrenamiento.Superficie_Cod = superficie.Cod INNER JOIN tipo_entrenamiento on entrenamiento.Tipo_entrenamiento_Cod = tipo_entrenamiento.Cod;");
        return $this->db->registros();
    }
 }

?>