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
        $this->db->query("SELECT c.*, s.Tipo, s.Cod as Cod_tipo FROM carrera c INNER JOIN superficie s on c.superficie_Cod = s.cod  ");
        return $this->db->registros();
    }

    public function agregarCarrera($datos){
        $this->db->query("INSERT into carrera Values (null,:titulo, :metros, :tiempo, :superficie, :usuario, :fecha)");
        $this->db->bind(':titulo',$datos['Titulo']);
        $this->db->bind(':metros',$datos['Metros']);
        $this->db->bind(':tiempo',$datos['Tiempo']);
        $this->db->bind(':superficie',$datos['superficie']);
        $this->db->bind(':usuario',$datos['CodUser']);
        $this->db->bind(':fecha',$datos['Fecha']);


        $this->db->execute();

    }
    public function modificarCarrera($datos){
        $this->db->query("UPDATE carrera set Titulo = :titulo, Metros = :metros, Tiempo = :tiempo,Superficie_Cod = :superficie , idUsuario = :usuario, Fecha =:fecha where Cod = :cod" );
        $this->db->bind(':titulo',$datos['Titulo']);
        $this->db->bind(':metros',$datos['Metros']);
        $this->db->bind(':tiempo',$datos['Tiempo']);
        $this->db->bind(':superficie',$datos['superficie']);
        $this->db->bind(':usuario',$datos['CodUser']);
        $this->db->bind(':fecha',$datos['Fecha']);
        $this->db->bind(':cod',$datos['Cod']);
        $this->db->execute();



    }

    public function eliminarCarrera($datos){
        $this->db->query("DELETE from carrera where Cod = $datos");
        $this->db->execute();
    }
 }

?>