<?php
 class CarreraModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }


    public function obtenerCarreras(){
        $this->db->query("SELECT * FROM carrera INNER JOIN superficie on carrera.superficie_Cod = superficie.cod;");
        return $this->db->registros();
    }
 }

?>