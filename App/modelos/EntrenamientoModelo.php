<?php
 class EntrenamientoModelo {
    private $db;

    public function __construct(){
        $this->db = new Base;
    }
    public function obtenerSuperficies(){
        $this->db->query("SELECT * FROM superficie;");
        return $this->db->registros();
    }


    public function obtenerEntrenamientos(){
        $this->db->query("SELECT e.*,s.Cod as Cod_superficie,s.Tipo,t.Tipo_entrenamiento,t.Cod as Cod_tipo FROM entrenamiento e INNER JOIN superficie s on e.superficie_Cod = s.Cod INNER JOIN tipo_entrenamiento t on e.Tipo_entrenamiento_Cod = t.Cod;");
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

    public function eliminar($id){
        
        $this->db->query("DELETE from entrenamiento where Cod = $id");
        $this->db->execute();
       
    }

 }

?>