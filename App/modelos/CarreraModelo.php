<?php
 class CarreraModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }


    public function obtenerCarreras(){
        $this->db->query("SELECT * FROM carrera INNER JOIN superficie on carrera.Superficie_Cod = superficie.Cod;
        ");

        return $this->db->registros();
    }
 }

?>