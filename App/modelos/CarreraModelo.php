<?php
 class CarreraModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function obtenerUsuarios(){
        $this->db->query("SELECT * FROM atleta INNER JOIN usuario on atleta.idUsuario = usuario.idUsuario;");
        return $this->db->registros();
    }

    public function obtenerCarreras(){
        $this->db->query("SELECT * FROM carrera INNER JOIN superficie on carrera.superficie_Cod = superficie.cod;");
        return $this->db->registros();
    }

    public function agregarCarrera($datos){
      print_r($datos);
        $this->db->query("INSERT into carrera Values (null,:titulo, :metros, :tiempo, :superficie, :usuario, :fecha)");
        $this->db->bind(':titulo',$datos['Titulo']);
        $this->db->bind(':metros',$datos['Metros']);
        $this->db->bind(':tiempo',$datos['Tiempo']);
        $this->db->bind(':superficie',$datos['superficie']);
        $this->db->bind(':usuario',$datos['CodUser']);
        $this->db->bind(':fecha',$datos['Fecha']);


        $this->db->execute();

    }
 }

?>