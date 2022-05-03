<?php
 class EntrenamientoModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }


    public function obtenerEntrenamientos(){
        $this->db->query("SELECT * FROM entrenamiento INNER JOIN superficie on entrenamiento.superficie_Cod = superficie.Cod INNER JOIN tipo_entrenamiento on entrenamiento.Tipo_entrenamiento_Cod = tipo_entrenamiento.Cod;");
        return $this->db->registros();
    }
    public function obtenerUsuarios(){
        $this->db->query("SELECT * FROM atleta INNER JOIN usuario on atleta.idUsuario = usuario.idUsuario;");
        return $this->db->registros();
    }

    public function obtenerTipos(){
        $this->db->query("SELECT * From tipo_entrenamiento");
        return $this->db->registros();

    }
    public function agregarEntrenamientos($datos) {
        print_r($datos);
        $this->db->query("INSERT into entrenamiento Values (null,:vuelta, :titulo, :tiempo, :metros, :Tipo_entre, :superficie, :usuario, :entrenador,:fecha)");
        $this->db->bind(':vuelta',$datos['Vueltas']);
        $this->db->bind(':titulo',$datos['Titulo']);
        $this->db->bind(':tiempo',$datos['Tiempo']);
        $this->db->bind(':metros',$datos['Metros']);
        $this->db->bind(':Tipo_entre',$datos['Tipo']);
        $this->db->bind(':superficie',$datos['superficie']);
        $this->db->bind(':usuario',$datos['CodUser']);
        $this->db->bind(':entrenador',$datos['CodEntre']);
        $this->db->bind(':fecha',$datos['Fecha']);


        $this->db->execute();
    }

    public function obtenerEntrenadores(){
        $this->db->query("SELECT * FROM entrenador INNER JOIN usuario on entrenador.idUsuario = usuario.idUsuario;");
        return $this->db->registros();


    }

 }

?>